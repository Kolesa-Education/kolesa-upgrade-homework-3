<html>
<body>
<form method="get">
    <select name="category">
        <option value="all">All</option>
        <?php
        $this->fillHTMLCategories();
        ?>
    </select>
    <button type="submit">GET</button>
</form>
<img src="<?php echo $this->catImg ?>" width="500" height="600"/>
</body>
</html>