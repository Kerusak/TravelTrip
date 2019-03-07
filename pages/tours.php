<?php
echo '<h1>Tours Page</h1>';
?>
<?php
    $link = mysql_connect('localhost', 'root', '');
    mysql_select_db('travel', $link);
?>
    <form action="#" method="post">
        <div class="form-group">
            <input type="text" name="title">

        </div>
    </form>
<?php
    $select = 'select title from post';
    $resource = mysql_query($select, $link);
    while ($row = mysql_fetch_array($resource)){
        echo "<div class='panel panel-primary'>
                 <div class='panel-heading'><h2>$row[0]</h2></div>
              </div>";
    }
?>