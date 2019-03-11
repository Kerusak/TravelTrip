<div class="row">
    <div class="col-md-6">
        <?php
        connect();
        $select = "select * from countries ORDER BY id";
        $resourse = mysql_query($select);
        ?>
        <form action="index.php?page=4" method="post">
            <div class="panel panel-success">
                <div class="panel panel-heading">
                    <h3>Form for Countries</h3>
                </div>
                <div class="panel panel-body">
                    <div class="form-group">
                        <table class="table table-stripped">
                            <?php while ($row = mysql_fetch_array($resourse)): ?>
                                <tr>
                                    <td><?= $row[0] ?></td>
                                    <td><?= $row[1] ?></td>
                                    <td><input type="checkbox" name="cb<?= $row[0] ?>"></td>
                                </tr>
                            <?php endwhile; ?>
                        </table>
                        <?php mysql_free_result($resourse); ?>
                    </div>
                    <div class="form-group">
                        <input type="text" name="country" placeholder="Country" class="form-control">
                    </div>
                </div>
                <div class="panel-footer">
                    <div class="form-group">
                        <input type="submit" name="addcountry" value="Add" class="btn btn-info">
                        <input type="submit" name="delcountry" value="Delete" class="btn btn-danger">
                    </div>
                </div>
            </div>
        </form>
        <?php
        if (isset($_POST['addcountry'])) {
            $country = trim(htmlspecialchars($_POST['country']));
            if ($country == '') {
                return false;
            }
            $insert = "insert into countries(country)VALUES ('$country')";
            mysql_query($insert);
            log_db(mysql_errno());
            reload();
        }
        if (isset($_POST['delcountry'])){
            foreach ($_POST as $key => $value){
                if (substr($key, 0,2)=="cb"){
                    $idc = substr($key, 2);
                    $delete = "delete from countries where id = '$idc'";
                    mysql_query($delete);
                    log_db(mysql_errno());
                }
            }
            reload();
        }
        ?>
    </div>
</div>