<?php
include("../confige/DbConnect.php");
$name = $_SESSION['name'] ?? 'Guest';


if (!isset($_SESSION['user_id'])) {
    die("Vous devez être connecté pour voir les statistiques.");
}

$user_id = $_SESSION['user_id'];

//
$sql = "SELECT 
          SUM(CASE WHEN problem_status = 'résolu' THEN 1 ELSE 0 END) AS resolved_count,
          SUM(CASE WHEN problem_status = 'en cours' THEN 1 ELSE 0 END) AS in_progress_count,
          COUNT(*) AS total_count
        FROM problem
        WHERE user_id = ?";

$stmt = $pdo->prepare($sql);
$stmt->execute([$user_id]);
$stats = $stmt->fetch(PDO::FETCH_ASSOC);


if (!$stats) {
    $stats = [
        'resolved_count' => 0,
        'in_progress_count' => 0,
        'total_count' => 0
    ];
}


// akhir 2 ta9ariri

$sql = "SELECT p.problem_name, p.description, u.first_name 
        FROM problem p
        JOIN users u ON p.user_id = u.user_id
        ORDER BY p.problem_date DESC 
        LIMIT 2";

$stmt = $pdo->prepare($sql);
$stmt->execute();
$latestReports = $stmt->fetchAll(PDO::FETCH_ASSOC);


// // fetch last 2 news 

$sql = "SELECT n.news_title_, n.news_description, a.first_name, a.last_name
        FROM news n
        JOIN admin a ON n.admin_id = a.admin_id
        ORDER BY n.news_id DESC
        LIMIT 2";

$stmt = $pdo->prepare($sql);
$stmt->execute();
$latestNews = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>