<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <title>Destination — Sillans la Cascade</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<?php
require_once 'data/destinations.php';

$id   = isset($_GET['id']) ? (int) $_GET['id'] : 3;
$dest = getDestinationById($id);

// Fallback to "La Selva" (id=3) if not found
if (!$dest) {
    $dest = getDestinationById(3);
}

// Truncate description for "read more" effect
$fullDesc  = htmlspecialchars($dest['description']);
$shortDesc = mb_substr($dest['description'], 0, 120);
$hasMore   = mb_strlen($dest['description']) > 120;
?>

<div class="app-shell">
<div class="detail-page">

    <!-- ── Hero Image ── -->
    <div class="detail-hero">
        <img
            id="hero-img"
            class="detail-hero-img"
            src="<?= htmlspecialchars($dest['image']) ?>"
            alt="<?= htmlspecialchars($dest['name']) ?>"
        >
        <div class="detail-hero-overlay"></div>

        <!-- Back button -->
        <a href="discover.php" class="detail-back-btn" aria-label="Back">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                <polyline points="15 18 9 12 15 6"/>
            </svg>
        </a>

        <!-- Heart button -->
        <button id="heart-btn" class="detail-heart-btn" aria-label="Add to favourites">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/>
            </svg>
        </button>

        <!-- Thumbnail strip -->
        <?php if (!empty($dest['thumbnails'])): ?>
        <div class="detail-thumbs">
            <?php foreach ($dest['thumbnails'] as $i => $thumb): ?>
            <img
                src="<?= htmlspecialchars($thumb) ?>"
                alt="View <?= $i + 1 ?>"
                class="thumb<?= $i === 0 ? ' active' : '' ?>"
                data-full="<?= htmlspecialchars(str_replace('w=160&h=160', 'w=600', $thumb)) ?>"
            >
            <?php endforeach; ?>
        </div>
        <?php endif; ?>

        <!-- Title overlay -->
        <div class="detail-hero-title">
            <span class="dest-name"><?= htmlspecialchars($dest['name']) ?></span>
            <div class="dest-loc">
                <svg width="13" height="13" viewBox="0 0 24 24" fill="currentColor">
                    <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/>
                </svg>
                <?= htmlspecialchars($dest['location']) ?>
            </div>
        </div>
    </div>

    <!-- ── Content ── -->
    <div class="detail-content">

        <!-- Stats row -->
        <div class="detail-stats">
            <div class="stat-item">
                <span class="stat-label">Distance</span>
                <span class="stat-value"><?= $dest['distance'] ?>Km</span>
            </div>
            <div class="stat-divider"></div>
            <div class="stat-item">
                <span class="stat-label">Temp</span>
                <span class="stat-value"><?= $dest['temp'] ?>°C</span>
            </div>
            <div class="stat-divider"></div>
            <div class="stat-item">
                <span class="stat-label">Rating</span>
                <span class="stat-value"><?= number_format($dest['rating'], 1) ?></span>
            </div>
        </div>

        <!-- Description -->
        <h3 class="detail-desc-title">Description</h3>
        <p class="detail-desc-text">
            <?php if ($hasMore): ?>
                <?= htmlspecialchars($shortDesc) ?>...
                <span id="desc-full" style="display:none"><?= htmlspecialchars(mb_substr($dest['description'], 120)) ?></span>
                <span id="read-more-btn" class="read-more">Read More</span>
            <?php else: ?>
                <?= $fullDesc ?>
            <?php endif; ?>
        </p>

    </div>

    <!-- ── Fixed Footer ── -->
    <div class="detail-footer">
        <div class="price-area">
            <span class="price-label">Total Price</span>
            <span class="price-value">$<?= number_format($dest['price']) ?></span>
        </div>
        <button class="book-btn" aria-label="Book now">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                <line x1="5" y1="12" x2="19" y2="12"/>
                <polyline points="12 5 19 12 12 19"/>
            </svg>
        </button>
    </div>

</div><!-- /.detail-page -->
</div><!-- /.app-shell -->

<script src="js/app.js"></script>
</body>
</html>
