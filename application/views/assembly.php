<div id="select_bots">
    <p class='portfolioTitle'> Bot the Builder! Can you build it?</p>

    <select name="Top Pieces" onchange="load_top_image(this);">
        <option value=0>Top Piece</option>
        <?php
        // populates the dropdownlist with top pieces owned
        foreach ($topcards as $key => $value) {
            if ($value > 0) {
                echo "<option value=" . $key . ">" . $key . " (" . $value . ")</option>";
            }
        }
        ?>
    </select>

    <select name="Middle Pieces" onchange="load_mid_image(this);">

        <option value=0>Middle Piece</option>
        <?php
        // populates the dropdownlist with middle pieces owned
        foreach ($midcards as $key => $value) {
            if ($value > 0) {
                echo "<option value=" . $key . ">" . $key . " (" . $value . ")</option>";
            }
        }
        ?>
    </select>

    <select name="Bottom Pieces" onchange="load_bot_image(this);">
        <option value=0>Bottom Piece</option>
        <?php
        // populates the dropdownlist with bottom pieces owned
        foreach ($botcards as $key => $value) {
            if ($value > 0) {
                echo "<option value=" . $key . ">" . $key . " (" . $value . ")</option>";
            }
        }
        ?>
    </select>
    <button type="button">Assemble</button>
</div>

<!-- Displays images of bot pieces selected -->
<div id="assemble_images">
    <img src="" id="bot_top" alt="">
    <img src="" id="bot_mid" alt="">
    <img src="" id="bot_bot" alt="">
</div>
