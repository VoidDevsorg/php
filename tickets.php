<?php include('include/header.php')?>

<?php 
if(!session('access_token')){
  header('Location: ?action=login');
} else {
?>
<?php
include 'functions.php';
// Connect to MySQL using the below function
$pdo = pdo_connect_mysql();
// MySQL query that retrieves  all the tickets from the databse
$stmt = $pdo->prepare('SELECT * FROM tickets ORDER BY created DESC');
$stmt->execute();
$tickets = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>
<section>
	<div class="wrapper">
    <br><br>
	 <h1 class="gamma lato thin uppercase ls-xlarge">
		 Void<br>
		 <span class="open-sans tera ls-small bold">Development</span><br><br>
		 <span class="epsilon ls-medium">We are doing something in our way :)</span>
        </h1>
        <br>
        <p style="color: #fff;">You can view all support requests here, but only view your support requests!</p>
        <button onclick="location.href='https://discord.gg/Qdbq2v8FM4'" class="voidbtn discord"><i class="fab fa-discord"></i> Our Discord</button>
     </div>
    </section>
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#2c2f33" fill-opacity="1" d="M0,32L60,64C120,96,240,160,360,160C480,160,600,96,720,101.3C840,107,960,181,1080,202.7C1200,224,1320,192,1380,176L1440,160L1440,0L1380,0C1320,0,1200,0,1080,0C960,0,840,0,720,0C600,0,480,0,360,0C240,0,120,0,60,0L0,0Z"></path></svg>
   
<div style="width:80%; margin:0 auto;">
<style>
  .btnn {
  color: inherit;
  font: inherit;
  color: #fff;
  font-weight: bold;
  background-color: #00BDFF;
  width: 100%;
  border: none;
  padding: 1rem;
  outline: none;
  box-sizing: border-box;
  border-radius: 1.5rem/50%;
  transition-duration: 0.4s;
}
.btnn:hover {
  background-color: #00A6FF;
  transform: scale(1.1);
  box-shadow: 0px 10px 8px #000;
}
.btnn:active {
  background-color: #00BDFF;
  transform: scale(1);
  box-shadow: 0px 5px 5px #000;
}

  .btnnn {
  color: inherit;
  font: inherit;
  font-weight: bold;
  color: #fff;
  background-color: #FF4D00;
  width: 100%;
  border: none;
  padding: 1rem;
  outline: none;
  box-sizing: border-box;
  border-radius: 1.5rem/50%;
  transition-duration: 0.4s;
}
.btnnn:hover {
  background-color: #FF6C00;
  transform: scale(1.1);
  box-shadow: 0px 10px 8px #000;
}
.btnnn:active {
  background-color: #FF4D00;
  transform: scale(1);
  box-shadow: 0px 5px 5px #000;
}




.badge-danger {
background: red;
}
.badge-primary {
background: blue;
}
.badge-info {
background: #003EFF;
}
.badge-success {
background: green;
}
</style>

<center style="margin-bottom: 80px; margin-top: 80px">

</center>

<table class="table table-striped table-dark">
<thead>
<tr>
                      <th>ID</th>
                      <th>Username</th>
                      <th>Title</th>
                      <th>Priority</th>
                      <th>Date</th>
                      <th>Status</th>
                      <th><button onclick="window.open('ticket.php', '_blank')" class="voidbtn createe"><i class="fa fa-plus"></i> Create Ticket</span></button></th>
</tr>
</thead>
<?php foreach ($tickets as $ticket): ?>
      <span class="con">
                    <tbody>
                      <tr>
                        <td><?=htmlspecialchars($ticket['id'], ENT_QUOTES)?></td>
                        <td><?=htmlspecialchars($ticket['username'], ENT_QUOTES)?></td>
                        <td><?=htmlspecialchars($ticket['title'], ENT_QUOTES)?></td>
                        <td>     
                       <span class="con">
        <?php if ($ticket['value'] == 'Düşük'): ?>
        <span class="badge badge-primary">Low</span>
        <?php elseif ($ticket['value'] == 'Orta'): ?>
        <span class="badge badge-success">Middle</span>
        <?php elseif ($ticket['value'] == 'Yüksek'): ?>
        <span class="badge badge-danger">High</span>
</span>
</td>
        <?php endif; ?>
                        <td><?=date('F dS, G:ia', strtotime($ticket['created']))?></td>
                        <td>     
                       <span class="con">
        <?php if ($ticket['status'] == 'open'): ?>
        <span class="badge badge-info">Open</span>
        <?php elseif ($ticket['status'] == 'resolved'): ?>
        <span class="badge badge-success">Resolved</span>
        <?php elseif ($ticket['status'] == 'closed'): ?>
        <span class="badge badge-danger">Closed</span>
</span>
</td>
        <?php endif; ?>
        <script>
          function createticket() {
            location.href= 'view.php?id=<?=htmlspecialchars($ticket['id'], ENT_QUOTES)?>';
          }
        </script>
    <td><button onclick="window.open('view.php?id=<?=htmlspecialchars($ticket['id'], ENT_QUOTES)?>','_blank')" class="voidbtn view"><i class="fad fa-eye"></i> View</span></button></td>

      </span>
                      </tr>
                    </tbody>
                  </span>
                </a>
            <?php endforeach; ?>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
  </div>
<?php } ?>

  <?php include('include/footer.php')?>
