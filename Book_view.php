<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" id="bookview">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">รายละเอียดการจอง</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-striped">
                    <tbody>
                        <?php
                        include './connent.php';
                        $sql = 'select book_tattoos.id_member,
                                      book_tattoos.book_tattoo_date,
                                      tattoo_size.tattoo_size_name,
                                    tattoo_color.tattoo_color_name,
                                      book_status.book_tattoo_status,
                                      book_tattoos.book_admin_set_time
                              FROM (((book_tattoos 
                              INNER JOIN tattoo_size on book_tattoos.book_tattoo_size = tattoo_size.tattoo_size_id)
                              INNER JOIN tattoo_color ON book_tattoos.book_tattoo_color = tattoo_color.tattoo_color_id)
                              INNER JOIN book_status ON book_tattoos.book_tattoo_status = book_status.book_tattoo_status_id)'
                                . 'where id_member='
                                . $_SESSION['member_id'];
                        $result = mysqli_query($conn, $sql);
                        while (($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) != NULL) {
                            echo '<tr>';
                            echo '<th scope="col">'.'วันที่เลือก'.'</th>';
                            echo '<td>' . $row['book_tattoo_date'] . '</td>';
                            echo '</tr>';

                            echo '<tr>';
                            echo '<th scope="col">'.'ขนาดที่เลือก'.'</th>';
                            echo '<td>' . $row['tattoo_size_name'] . '</td>';
                            echo '</tr>';

                            echo '<tr>';
                            echo '<th scope="col">'.'สีที่เลือก'.'</th>';
                            echo '<td>' . $row['tattoo_color_name'] . '</td>';
                            echo '</tr>';

                            echo '<tr>';
                            echo '<th scope="col">'.'สถานะ'.'</th>';
                            echo '<td>' . $row['book_tattoo_status'] . '</td>';
                            echo '</tr>';

                            echo '<tr>';
                            echo '<th scope="col">'.'เวลาที่นัด'.'</th>';
                            echo '<td>' . $row['book_admin_set_time'] . '</td>';
                            echo '</td>';
                        }
                        mysqli_free_result($result);
                        mysqli_close($conn);
                        ?>        
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <a href="Book_del.php?id_member=<?php echo $row["id_member"];?>" class="btn btn-danger">ลบการจองคิว</a>
            </div>
        </div>
    </div>
</div>




