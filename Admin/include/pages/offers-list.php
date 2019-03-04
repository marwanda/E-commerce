<?php
if (isset($_SESSION['error_msg']) && !empty($_SESSION['error_msg'])) {
    echo '<input id="error-msg" type="hidden" value="'.$_SESSION['error_msg'].'">';
    $_SESSION['error_msg'] = '';

}

$link = mysqli_connect("localhost", "root", "", "itsource");
mysqli_set_charset($link, "utf8");
$sq = "'";
$path = '../';
$query = "select * from projects where type=1";


if (mysqli_connect_errno()) {
    $_SESSION['error_msg'] = mysqli_connect_error();
    echo '<script language="javascript">';
    echo 'alert("' . $_SESSION['error_msg'] . '")';
    echo '</script>';
    $_SESSION['error_msg'] = '';
}
?>


<div class="content-inner chart-cont">

    <div class="row ">
        <h2 class="mb-5">Offers Listing</h2>
        <table style="width: 100% " id="datatable" class="table table-hover mt-5 table-striped">
            <thead>
            <tr class="bg-info text-white">
                <th class="text-left" style="width: 5%">#</th>
                <th class="table-width-3">Full Name</th>
                <th class="table-width-3">Mobile</th>
                <th class="table-width-3">Date</th>
                <th class="table-width-3">File</th>

            </tr>
            </thead>
            <tbody>

            <?php

            if ($result = mysqli_query($link, $query)) {
                while ($row = mysqli_fetch_assoc($result)) {

                    ?>
                    <tr class="project-row" id="project-<?php echo $row['id']; ?>">
                        <td class=""><?php echo $row['id']; ?></td>
                        <td class=""><?php echo $row['name']; ?></td>
                        <td class=""><?php echo $row['phone']; ?></td>
                        <td class=""><?php echo $row['date']; ?></td>
                        <td class="">
                            <a href="<?php echo $FILES_ROOT.'documents/projects/'.$row['file'] ?>" name="" data-id="<?php echo $row['id']; ?>"><?php echo $row['file']; ?></a>
                        </td>

                    </tr>
                    <?php
                }
            } else {
                echo '<script language="javascript">';
                echo "alert('" . $lang['general_error'] . "')";
                echo '</script>';
                mysqli_close($link);

            }
            ?>

            </tbody>
        </table>
    </div>
</div>


