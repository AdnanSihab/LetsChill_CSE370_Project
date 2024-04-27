
<?php include('header.php');
if(!isset($_SESSION['user']))
{
    header('location:login.php');
}

$user_id = $_SESSION['user'];
$query = "SELECT email, phone FROM tbl_registration WHERE user_id = '$user_id'";
$result = mysqli_query($con, $query);
$user_info = mysqli_fetch_assoc($result);
?>

<div class="content">
    <div class="wrap">
        <div class="content-top">
            <div class="section group">
                <?php include('msgbox.php'); ?>

                <div class="about span_1_of_2">
                    <h3>User Profile</h3>
                    <p>Email: <?php echo $user_info['email']; ?></p>
                    <p>Phone: <?php echo $user_info['phone']; ?></p>

                    <h3>Update Information</h3>
                    <form method="post" action="update_profile.php">
                        <label for="email">Email:</label>
                        <input type="email" id="email" name="email" value="<?php echo $user_info['email']; ?>" required>
                        <br>
                        <label for="phone">Phone:</label>
                        <input type="tel" id="phone" name="phone" value="<?php echo $user_info['phone']; ?>" required>
                        <br>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>

                    <h3>Delete Account</h3>
                    <p>Are you sure you want to delete your account? This action cannot be undone.</p>
                    <button data-toggle="modal" data-target="#delete-modal" class="btn btn-danger">Delete Account</button>
                </div>

                <?php include('concert_sidebar.php'); ?>
            </div>
        </div>
    </div>
</div>

<!-- Delete Account Modal -->
<div class="modal fade" id="delete-modal" tabindex="-1" role="dialog" aria-labelledby="delete-modal-label" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="delete-modal-label">Delete Account</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Are you sure you want to delete your account? This action cannot be undone.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <a href="delete_account.php" class="btn btn-danger">Delete Account</a>
            </div>
        </div>
    </div>
</div>

<?php include('footer.php'); ?>