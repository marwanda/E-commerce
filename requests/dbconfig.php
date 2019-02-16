<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
$link = mysqli_connect("localhost", "root", "", "itsource");

    if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
    }

    if ($result = mysqli_query($link)) {
        printf("Select returned %d rows.\n", mysqli_num_rows($result));

        while ($row=mysqli_fetch_assoc($result))
        {
            printf ("%s %s %s\n",$row['id'],$row['name'],$row['role']);
        }

        /* free result set */
        mysqli_free_result($result);
    }

    mysqli_close($link);



/* check connection */


/* Create table doesn't return a resultset */
//if (mysqli_query($link, "") === TRUE) {
//    printf("Table myCity successfully created.\n");
//}

/* If we have to retrieve large amount of data we use MYSQLI_USE_RESULT */
//if ($result = mysqli_query($link, "SELECT * FROM City", MYSQLI_USE_RESULT)) {
//
//    /* Note, that we can't execute any functions which interact with the
//       server until result set was closed. All calls will return an
//       'out of sync' error */
//    if (!mysqli_query($link, "SET @a:='this will not work'")) {
//        printf("Error: %s\n", mysqli_error($link));
//    }
//    mysqli_free_result($result);
//}

/* Select queries return a resultset */

?>