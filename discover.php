<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <title>Discover — Sillans la Cascade</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<?php require_once 'data/destinations.php'; ?>

<div class="app-shell">
<div class="discover-page">

    <!-- White sliding card -->
    <div class="discover-card">

        <!-- ── Header ── -->
        <div class="discover-header">
            <h1 class="discover-title">Discover</h1>
            <div class="header-actions">
                <button class="icon-btn" aria-label="Search">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/>
                    </svg>
                </button>
                <button class="icon-btn" aria-label="Filter">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="12" r="3"/>
                        <path d="M19.07 4.93a10 10 0 0 1 0 14.14M4.93 4.93a10 10 0 0 0 0 14.14"/>
                    </svg>
                </button>
            </div>
        </div>

        <!-- ── Tabs ── -->
        <div class="tabs">
            <div class="tab active" data-tab="jungle">Jungle</div>
            <div class="tab" data-tab="beach">Beach</div>
            <div class="tab" data-tab="mountain">Mountain</div>
            <div class="tab" data-tab="water">Waterfall</div>
        </div>

        <!-- ── Featured Destinations ── -->
        <div class="featured-scroll">
            <?php
            $featured = [
                ['id'=>1, 'name'=>'La Costa',       'location'=>'Peru, South America',   'category'=>'jungle', 'rating'=>4.8, 'image'=>'https://images.unsplash.com/photo-1552465011-b4e21bf6e79a?w=400&fit=crop'],
                ['id'=>2, 'name'=>'Rio De Janeiro',  'location'=>'Brazil, South America', 'category'=>'beach',  'rating'=>4.9, 'image'=>'https://images.unsplash.com/photo-1483729558449-99ef09a8c325?w=400&fit=crop'],
                ['id'=>3, 'name'=>'La Selva',        'location'=>'Peru, South America',   'category'=>'jungle', 'rating'=>4.8, 'image'=>'https://images.unsplash.com/photo-1448375240586-882707db888b?w=400&fit=crop'],
                ['id'=>6, 'name'=>'Bali Jungle',     'location'=>'Indonesia, Asia',       'category'=>'jungle', 'rating'=>4.9, 'image'=>'https://images.unsplash.com/photo-1537996194471-e657df975ab4?w=400&fit=crop'],
                ['id'=>7, 'name'=>'Maldives Atoll',  'location'=>'Maldives, Asia',        'category'=>'water',  'rating'=>5.0, 'image'=>'https://images.unsplash.com/photo-1514282401047-d79a71a590e8?w=400&fit=crop'],
                ['id'=>8, 'name'=>'Swiss Alps',      'location'=>'Switzerland, Europe',   'category'=>'mountain','rating'=>4.8,'image'=>'https://images.unsplash.com/photo-1530122037265-a5f1f91d3b99?w=400&fit=crop'],
            ];
            foreach ($featured as $dest): ?>
            <a href="detail.php?id=<?= $dest['id'] ?>"
               class="featured-card"
               data-category="<?= htmlspecialchars($dest['category']) ?>">
                <img class="featured-card-img"
                     src="<?= htmlspecialchars($dest['image']) ?>"
                     alt="<?= htmlspecialchars($dest['name']) ?>">
                <div class="featured-card-overlay"></div>
                <div class="rating-badge">
                    <svg width="11" height="11" viewBox="0 0 24 24" fill="#F5A623"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
                    <?= number_format($dest['rating'], 1) ?>
                </div>
                <div class="featured-card-info">
                    <span class="fc-name"><?= htmlspecialchars($dest['name']) ?></span>
                    <span class="fc-loc"><?= htmlspecialchars($dest['location']) ?></span>
                </div>
            </a>
            <?php endforeach; ?>
        </div>

        <!-- ── Top Destinations ── -->
        <div class="section-header">
            <h2 class="section-title">Top Destination</h2>
            <button class="more-btn" aria-label="More">•••</button>
        </div>

        <div class="top-grid">
            <?php
            $top = [
                ['id'=>4, 'name'=>'Salvador', 'location'=>'Brazil',  'category'=>'beach',   'image'=>'https://images.unsplash.com/photo-1507525428034-b723cf961d3e?w=300&fit=crop'],
                ['id'=>5, 'name'=>'La Sierra', 'location'=>'Peru',   'category'=>'mountain','image'=>'https://images.unsplash.com/photo-1464822759023-fed622ff2c3b?w=300&fit=crop'],
                ['id'=>6, 'name'=>'Bali Jungle','location'=>'Indonesia','category'=>'jungle','image'=>'https://images.unsplash.com/photo-1537996194471-e657df975ab4?w=300&fit=crop'],
                ['id'=>7, 'name'=>'Maldives',  'location'=>'Asia',   'category'=>'water',   'image'=>'https://images.unsplash.com/photo-1514282401047-d79a71a590e8?w=300&fit=crop'],
            ];
            foreach ($top as $dest): ?>
            <a href="detail.php?id=<?= $dest['id'] ?>"
               class="top-card"
               data-category="<?= htmlspecialchars($dest['category']) ?>">
                <img class="top-card-img"
                     src="<?= htmlspecialchars($dest['image']) ?>"
                     alt="<?= htmlspecialchars($dest['name']) ?>">
                <div class="top-card-info">
                    <span class="tc-name"><?= htmlspecialchars($dest['name']) ?></span>
                    <span class="tc-loc"><?= htmlspecialchars($dest['location']) ?></span>
                </div>
            </a>
            <?php endforeach; ?>
        </div>

    </div><!-- /.discover-card -->

    <!-- ── Bottom Navigation ── -->
    <nav class="bottom-nav">
        <div class="nav-item">
            <div class="nav-icon-wrap active">
                <svg width="22" height="22" viewBox="0 0 24 24" fill="currentColor">
                    <path d="M10 20v-6h4v6h5v-8h3L12 3 2 12h3v8z"/>
                </svg>
            </div>
        </div>
        <div class="nav-item">
            <div class="nav-icon-wrap">
                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/>
                </svg>
            </div>
        </div>
        <div class="nav-item">
            <div class="nav-icon-wrap">
                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/>
                    <circle cx="12" cy="7" r="4"/>
                </svg>
            </div>
        </div>
        <div class="nav-item">
            <div class="nav-icon-wrap">
                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/>
                </svg>
            </div>
        </div>
    </nav>

</div><!-- /.discover-page -->
</div><!-- /.app-shell -->

<script src="js/app.js"></script>
</body>
</html>
