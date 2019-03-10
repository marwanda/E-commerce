<?php
if (isset($_SESSION['error_msg']) && !empty($_SESSION['error_msg']) && isset($_SESSION['msg_type'])) {
    if($_SESSION['msg_type']==1)
        echo '<input id="error-msg" data-type="success"  type="hidden" value="'.$_SESSION['error_msg'].'">';
    else if($_SESSION['msg_type']==-1)
        echo '<input id="error-msg" data-type="error"  type="hidden" value="'.$_SESSION['error_msg'].'">';
    else
        echo '<input id="error-msg" data-type="warn"  type="hidden" value="'.$_SESSION['error_msg'].'">';
    $_SESSION['error_msg'] = '';
    $_SESSION['msg_type'] = '';

}


$link = connectDb_mysqli();
mysqli_set_charset($link, "utf8");
$sq = "'";
$path = '../';
$query = "select * from projects where type=0";


if (mysqli_connect_errno()) {
    $_SESSION['error_msg'] = $lang['sql_problem'];
    echo '<input id="error-msg" data-type="error"  type="hidden" value="'.$_SESSION['error_msg'].'">';
    $_SESSION['error_msg'] ='';
}
?>


<div class="content-inner chart-cont">

    <div class="row ">
        <h2 class="mb-5">Project Listing</h2>
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
                $_SESSION['error_msg']=$lang['sql_problem'];
                $_SESSION['msg_type']=-1;
                redirect('orders-list');
                mysqli_close($link);
                exit();

            }
            ?>

            </tbody>
        </table>
    </div>
</div>


