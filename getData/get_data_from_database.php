
    <?php
    function get_data_from_database($table, $query, $arr)
    {
        $link = mysqli_connect('localhost', 'dima', '0978191652', 'zavod');
        $result = mysqli_query($link, $query);
        if ($result) {
            $rows = mysqli_num_rows($result);
            echo "<table style='border: 1px solid #091234; border-radius: 3px; margin-top: 20px'>";
            $num_col = mysqli_num_fields($result);
            echo "<tr>";
            for ($i = 0; $i < $num_col; $i++)
                echo "<td style='border: 1px solid #091234; padding: 10px; border-radius: 3px'>$arr[$i]</td>";
            echo "<td></td>";
            echo "</tr>";
            $val = 0;
            $num = 0;
            while ($line = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                echo "<tr>";
                foreach ($line as $col_value) {
                    if ($num == 0) {
                        $val = $col_value;
                    }
                    $num++;
                    echo "<td style='border: 1px solid #091234; padding: 10px; border-radius: 3px'>$col_value</td>";
                }
                $num = 0;
                echo '<td>' . $src_one = "<a class='remove' href=http://localhost/site/remove/remove.php?table=$table&val=$val&rows=$rows><i class='far fa-trash-alt'></i></a>" . '</td>';
                echo "</tr>";
            }
            echo "</table>";

            mysqli_free_result($result);
        }

        mysqli_close($link);
    }

    ?>
