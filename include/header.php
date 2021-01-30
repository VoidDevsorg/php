<?php include('auth.php') ?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <html lang="en">
    <meta charset="UTF-8"><meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="We are doing something in our own way :)">
    <meta content="We are doing something in our own way :)" property="og:description">
    <meta content="https://cdn.discordapp.com/attachments/742496324271734846/791993448222687232/vd.jpg" property="og:image">
    <meta name="theme-color" content="#7289da">
    <meta name="keywords" content="devs, developers, development, discord, discord team, team, void, void development, vdevs, javascript, node.js, html, php, index, ruby, c++, c#, elixr, bots, discordbots, discord developers, discord portal, discord devs, discord devteam, discord dev team">
    <meta name="author" content="Void Development">
    <meta name="generator" content="Void Development">
    <title>Void Development</title>
    <link rel="icon" href="https://cdn.discordapp.com/attachments/742496324271734846/791993448222687232/vd.jpg" sizes="192x192" />
    <!-- OTHER CSS -->
    <link href="css/table.css" rel="stylesheet" />
    <link href="css/footer.css" rel="stylesheet" />
    <link href="https://pro.fontawesome.com/releases/v5.11.2/css/all.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link href="css/void.css" rel="stylesheet" />
    <link href="css/intro.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <!-- OTHER JS -->
    <script src="https://cpwebassets.codepen.io/assets/common/stopExecutionOnTimeout-157cd5b220a5c80d4ff8e0e70ac069bffd87a61252088146915e8726e5d9f147.js"></script>
    <script src="javascript/void.js"></script>
</head>
<nav id="nav">
	<input id="nav-toggle" type="checkbox">
	<div id="logo"><img width="64" src="https://cdn.discordapp.com/attachments/742496324271734846/791993448222687232/vd.jpg"></div>
	<ul class="links">
		<li><a href="/index.php">Home</a></li>
    <li><a href="/index.php#about">About</a></li>
		<li><a href="/team.php">Team</a></li>
		<li><a href="/index.php#projects">Projects</a></li>
    <li><a href="https://blog.voiddevs.org/">Blog</a></li>
    <?php if(session('access_token')) {
  $user = apiRequest($apiURLBase);?>
  <li><a href="/user.php" class="register"><?php echo $user->username ?></a></li>
<?php } else {?>
  <li><a href="?action=login" class="register">Login</a></li>
<?php } ?>
	</ul>
	<label for="nav-toggle" class="icon-burger">
		<div class="line"></div>
		<div class="line"></div>
		<div class="line"></div>
	</label>
</nav>
<br><br><br><br>

