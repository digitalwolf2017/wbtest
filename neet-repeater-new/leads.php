<?php

$lead_id=$_GET['lead_id'] ?? '';

$brochure = isset($_GET['brochure']) && $_GET['brochure'] === '1' ? '?brochure=1' : '';

header("Location: thankyou.php" . $brochure);

exit;

?>