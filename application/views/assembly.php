<div id="select_bots">
    <p class='portfolioTitle'> Bot the Builder! Can you build it?</p>
    <select name="Top Pieces" onchange="load_top_image(this);">
        <option value=0>'Pick the top piece!'</option>
        <?php
        //add owned pieces to drop down, skip if # owned is 0
        foreach($topcards as $key => $value)
        {
            if($value > 0)
            {
                echo "<option value=" . $key . ">" . $key . " (" . $value . ")</option>";
            }
        }
        ?>
    </select>
    <br /><br /><br /><br /><br />
    <select name="Middle Pieces" onchange="load_mid_image(this);">
        <option value=0>'Pick the middle piece!'</option>
        <?php
        //add owned pieces to drop down, skip if # owned is 0
        foreach($midcards as $key => $value)
        {
            if($value > 0)
            {
                echo "<option value=" . $key . ">" . $key . " (" . $value . ")</option>";
            }
        }
        ?>
    </select>
    <br /><br /><br /><br /><br />
    <select name="Bottom Pieces" onchange="load_bot_image(this);">
        <option value=0>'Pick the bottom piece!'</option>
        <?php
        //add owned pieces to drop down, skip if # owned is 0
        foreach($botcards as $key => $value)
        {
            if($value > 0)
            {
                echo "<option value=" . $key . ">" . $key . " (" . $value . ")</option>";
            }
        }
        ?>
    </select>
    <br /><br /><br /><br /><br />
    <button type="button">Assemble</button>
</div>

<!-- image src will be changed based on selected item from dropdown menus -->
<div id="assemble_images">
    <img src="" id="bot_top" alt="">
    <img src="" id="bot_mid" alt="">
    <img src="" id="bot_bot" alt="">
</div>
