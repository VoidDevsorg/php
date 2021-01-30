<?=include ('include/header.php');?>

<?php
if(!session('access_token')){
    header('Location: ?action=login');
  } else {

include ('functions.php');
// Connect to MySQL using the below function
$pdo = pdo_connect_mysql();
// Check if the ID param in the URL exists
if (!isset($_GET['id'])) {
    exit('Invalid ID!');
}
// MySQL query that selects the ticket by the ID column, using the ID GET request variable
$stmt = $pdo->prepare('SELECT * FROM tickets WHERE id = ?');
$stmt->execute([ $_GET['id'] ]);
$ticket = $stmt->fetch(PDO::FETCH_ASSOC);
// Check if ticket exists
if (!$ticket) {
    exit('Invalid ID!');
}
// Update status
if (isset($_GET['status']) && in_array($_GET['status'], array('open', 'closed', 'resolved'))) {
    $stmt = $pdo->prepare('UPDATE tickets SET status = ? WHERE id = ?');
    $stmt->execute([ $_GET['status'], $_GET['id'] ]);
    header('Location: tickets.php?id=' . $_GET['id']);
    exit;
}

// Check if the comment form has been submitted
if (isset($_POST['msg']) && !empty($_POST['msg'])) {
    // Insert the new comment into the "tickets_comments" table
    $stmt = $pdo->prepare('INSERT INTO tickets_comments (ticket_id, msg) VALUES (?, ?)');
    $stmt->execute([ $_GET['id'], $_POST['msg'] ]);
    header('Location:user/view.php?id=' . $_GET['id']);
    exit;
}
$stmt = $pdo->prepare('SELECT * FROM tickets_comments WHERE ticket_id = ? ORDER BY created DESC');
$stmt->execute([ $_GET['id'] ]);
$comments = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<?=template_header('Ticket')?>


<br><br><br><br><br>
        <?php if($user->username==htmlspecialchars($ticket['username'], ENT_QUOTES)): ?>
        <link href="admin/ticket/style.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
<div style="color: #fff;"  class="content view">
	<h2 style="color: #fff"><?=htmlspecialchars($ticket['title'], ENT_QUOTES)?> <span class="<?=$ticket['status']?>">
        (<span class="con">
        <?php if ($ticket['status'] == 'open'): ?>
        <span>Open</span>
        <?php elseif ($ticket['status'] == 'resolved'): ?>
        <span>Resolved</span>
        <?php elseif ($ticket['status'] == 'closed'): ?>
        <span>Closed</span>
</span><?php endif; ?>)
</span></h2>

    <div style="color: #fff;" class="ticket">
        <p class="created"><?=date('F dS, G:ia', strtotime($ticket['created']))?></p>
        <p class="msg"><?=nl2br(htmlspecialchars($ticket['msg'], ENT_QUOTES))?></p>
    </div>


    <div class="comments">
        <?php foreach($comments as $comment): ?>
        <div class="comment">
            <div>
                <i class="fas fa-comment fa-2x"></i>
            </div>
            <p>
                <span><?=date('F dS, G:ia', strtotime($comment['created']))?></span>
                <?=nl2br(htmlspecialchars($comment['msg'], ENT_QUOTES))?>
            </p>
        </div>
        <?php endforeach; ?>
        <?php if ($ticket['status'] == 'open') { ?>
        <form action="" method="post">
            <textarea name="msg" placeholder="Enter your comment..."></textarea>
            <input type="submit" value="Submit">
        </form>
        <?php } else { ?>
        <h3>This support request has been closed by admin, so you cannot write!</h3>
        <?php } ?>
       <?php else: ?>
        <br><br><br><br><br><br>
       <center><h1>This ticket is not yours!</h1></center>
       <script> swal("Error","This ticket is not yours!","error"); </script>
       <?php endif ?>
    </div>

</div>
<br><br><br><br><br><br><br><br><br><br><br>
<?php include('include/footer.php');?>
<?php } ?>