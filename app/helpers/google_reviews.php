<?php
/**
 * Fetch and cache Google Places rating data.
 * Uses Google Places API (New) with field mask for rating and review count.
 * Caches results for 6 hours to stay within API limits.
 */

function getGoogleReviewData(): array
{
    $default = [
        'rating' => 0,
        'total_reviews' => 0,
        'review_url' => '',
        'fetched' => false,
    ];

    $apiKey = GOOGLE_PLACES_API_KEY;
    $placeId = GOOGLE_PLACE_ID;

    if (empty($apiKey) || empty($placeId)) {
        return $default;
    }

    // Build the review URL (works without API)
    $default['review_url'] = 'https://search.google.com/local/writereview?placeid=' . urlencode($placeId);

    // Check cache
    $cacheFile = STORAGE_PATH . '/cache/google_reviews.json';
    $cacheTTL = 6 * 3600; // 6 hours

    if (file_exists($cacheFile) && (time() - filemtime($cacheFile)) < $cacheTTL) {
        $cached = json_decode(file_get_contents($cacheFile), true);
        if ($cached && !empty($cached['fetched'])) {
            return $cached;
        }
    }

    // Fetch from Google Places API (New)
    $url = 'https://places.googleapis.com/v1/places/' . urlencode($placeId)
         . '?fields=rating,userRatingCount&key=' . urlencode($apiKey);

    $ch = curl_init($url);
    curl_setopt_array($ch, [
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_TIMEOUT => 10,
        CURLOPT_SSL_VERIFYPEER => true,
        CURLOPT_HTTPHEADER => [
            'Content-Type: application/json',
            'X-Goog-FieldMask: rating,userRatingCount',
        ],
    ]);
    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    if ($httpCode !== 200 || !$response) {
        // On failure, return stale cache if available, otherwise default
        if (file_exists($cacheFile)) {
            $stale = json_decode(file_get_contents($cacheFile), true);
            if ($stale) return $stale;
        }
        return $default;
    }

    $data = json_decode($response, true);

    $result = [
        'rating' => round((float)($data['rating'] ?? 0), 1),
        'total_reviews' => (int)($data['userRatingCount'] ?? 0),
        'review_url' => $default['review_url'],
        'fetched' => true,
    ];

    // Write cache
    @file_put_contents($cacheFile, json_encode($result));

    return $result;
}
