
<?php include './includes/header.php'; ?>

<body>

    <div id="page-container">
        <div id="content-wrap">
            <img src="images/larrys-logo.png" alt="LPRCS_Logo" class="logo">
            <?php include 'includes/search.php'?>

            <div class="container">
                <div class="row">
                    <div class="col">
                        <?php include 'conn/table.php'?>
                    </div>
                </div>
            </div>

            <?php include './includes/top_button.php'; ?>

            <footer id="footer">
                <?php include './includes/footer.php'; ?>
            </footer>

            <!-- Bootstrap core JavaScript -->
            <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
            <!---->
            <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
            <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
        </div>
    </div>
</body>