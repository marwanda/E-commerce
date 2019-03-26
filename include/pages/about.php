<?php


$link = connectDb_mysqli();
mysqli_set_charset($link, "utf8");

$query = "select * from gallary_home where type= 7";

if ($result = mysqli_query($link, $query)) {
    $count = mysqli_num_rows($result);
    if ($count > 0) {
        while ($row = mysqli_fetch_assoc($result)) {

            $pic_name = $row['name'];
            $pic_text = explode('-', $row['text']);

        }
    }
}


?>
<!--====================================================
                       HOME-P
======================================================-->
    <div id="home-p" style="background-image: url('files/images/gallary/large/<?php echo $pic_name ?>')" class="home-p pages-head1 text-center">
        <div class="container">
            <h1 class="wow fadeInUp" data-wow-delay="0.1s"><?php echo $lang['about']?></h1>
            <p><?php echo $lang['discover_about']?></p>
        </div>
        <!--/end container-->
    </div>
<div class="container mt-5 mb-5">
    <div class="w3-padding w3-white notranslate">
        <h3><?php echo $lang['our_team']?></h3>
        <div class="heading-border-light"></div>
        <table class="table table-striped table-responsive">
            <thead>
            <tr>
                <th class="tabel-width"><?php echo $lang['name']?></th>
                <th class="tabel-width"><?php echo $lang['mobile']?></th>
                <th class="tabel-width"><?php echo $lang['email']?></th>
                <th class="tabel-width"><?php echo $lang['job_title']?></th>
            </tr>
            </thead>
            <tbody>
            <?php

            $query = "select * from about ";

            if ($result = mysqli_query($link, $query)) {
                $count = mysqli_num_rows($result);
                if ($count > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {

                        ?>
                        <tr>
                            <td><?php echo $row['name'] ?></td>
                            <td><?php echo $row['phone'] ?></td>
                            <td><?php echo $row['email'] ?></td>
                            <td><?php echo $row['job'] ?></td>



                        </tr>
                    <?php  }
                }
            }


            ?>
            </tbody>
        </table>
    </div>

</div>

