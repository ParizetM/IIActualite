<style>
    #debugger {
        display: inline-block;
        position: sticky;
        top: 0;
        left: 500px;
        background-color: white;
        border-radius: 10px;
        z-index: 200;
        padding: 10px;
        border: blue 1px solid;
    }
</style>
<div id="debugger">
    <?php
    echo "DEBUGGER : <br/>";
    if (isset($_SESSION)) {
        foreach ($_SESSION as $key => $value) {
            echo $key . " :" . $value . "<br/>";
        }
    }
    echo "Method GET : <br/>";
    foreach ($_GET as $key => $value) {
        echo $key . " :" . $value . "<br/>";
    }
    echo "Method POST : <br/>";
    foreach ($_POST as $key => $value) {
        echo $key . " :" . $value . "<br/>";
    }
    ?>
</div>