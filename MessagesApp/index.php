<?php
    include 'db.php';

    // SELECT Query
    $query = "SELECT * FROM `messages` ORDER BY Create_Date DESC";
    $messages = mysqli_query($conn, $query);

    if(isset($_GET['action']) && isset($_GET['id'])){
        if($_GET['action']== 'delete'){
            $id = $_GET['id'];
            
            //DELETE Query
            $query = "DELETE FROM messages WHERE ID = $id";

            if(!mysqli_query($conn, $query)){
                die(mysqli_error($conn));
            }else{
                header("Location: index.php?success=Message%20Removed");
            }
        }
    }

    if(isset($_GET["error"])){
        $errorMsg = $_GET['error'];
    }
    if(isset($_GET["success"])){
        $success = $_GET['success'];
    }
?>

<!DOCTYPE>
<html>
    <head>
        <title>Message App</title>
        
        <link rel="stylesheet" href="css/style.css">
    </head>

    <body>
        <div class="container">
            <header>
                <h1>Message App</h1>

                <?php if(isset($errorMsg)): ?>
                    <div class="alert">
                        <?php echo $errorMsg; ?>
                    </div>
                <?php endif; ?>
                
                <?php if(isset($success)): ?>
                    <div class="alert-success">
                        <?php echo $success; ?>
                    </div>
                <?php endif; ?>
            </header>

            <main>
                <form class="mess-form" method="POST" action="process.php">
                    <div class="form-group">
                        <label>Text:</label>
                        <input type="text" name="text" placeholder="Enter Text..."></input>
                    </div>

                    <div class="form-group">
                        <label>Username:</label>
                        <input type="text" name="user" placeholder="Enter Username..."></input>
                    </div>

                    <button type="submit" class="btn-submit">
                        Submit
                    </button>
                </form>

                <hr>

                <ul class="messages">
                    <?php if($messages->num_rows > 0) : ?>
                        <?php while($row = mysqli_fetch_assoc($messages)) : ?>
                            <li>
                                <?php echo $row['Text']; ?> |  <?php echo $row['User']; ?> [ <?php echo $row['Create_Date']; ?> ]

                                <a class="delete" href="index.php?action=delete&id=<?php echo $row['ID']; ?>">[X]</a>
                            </li>
                        <?php endwhile; ?>
                    <?php else : ?>
                        <li> No Messages </li>
                    <?php endif; ?>
                </ul>
            </main>

            <hr>

            <footer>
                MessageApp &copy; 2018
            </footer>
        </div>
    </body>
</html>