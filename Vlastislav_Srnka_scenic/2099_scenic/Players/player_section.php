<?php
require_once __DIR__ . '/../CRUD/config.php';

$sql = "SELECT name, description, image FROM players ORDER BY id DESC";
$result = $conn->query($sql);
?>

<section id="team" class="parallax-section">
    <div class="container">
        <div class="row">
            <div class="col-md-offset-2 col-md-8 col-sm-12">
                <div class="section-title">
                    <h1>All Time Players</h1>
                </div>
            </div>

            <div class="clearfix"></div>
            <div id="owl-team" class="owl-carousel">
                <?php while ($row = $result->fetch_assoc()): ?>
                    <div class="col-md-4 col-sm-4 item">
                        <div class="team-item">
                            <img src="<?= htmlspecialchars($row['image']) ?>" class="img-responsive" alt="">
                            <div class="team-overlay">
                                <ul class="social-icon">
                                    <li><a href="#" class="fa fa-twitter"></a></li>
                                    <li><a href="#" class="fa fa-instagram"></a></li>
                                </ul>
                            </div>
                        </div>
                        <p><?= htmlspecialchars($row['description']) ?></p>
                        <h3><?= htmlspecialchars($row['name']) ?></h3>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
    </div>
</section>

<?php $conn->close(); ?>
