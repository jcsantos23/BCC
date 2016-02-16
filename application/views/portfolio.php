<!-- dropdownlist to select players -->
<form method="post">
    <div class="player-select">
        <label for="player">Player Selection</label>
        {players}
    </div>
</form> 

<div class="alone"></div>

<!-- displays the transactions for the player select -->
<div>
    <table>
        <tr>
            <th>Player's Recent Activity</th>
        </tr>
    </table>
    <table class="table">
        <tr>
            <th>DateTime</th>
            <th>Player</th>
            <th>Series</th>
            <th>Transaction</th>
        </tr>
        {transactions}
        <tr>
            <td>{DateTime}</td>
            <td>{Player}</td>
            <td>{Series}</td>
            <td>{Trans}</td>
        </tr>
        {/transactions}
    </table>

    <!-- displays the amount of pieces owned for each bot -->
    <table class="ch">
        <tr>
            <th>Current Holdings</th>
        </tr>
    </table>
    <table class = "pictures">
        <tr>
            <th>Series</th>
            <th>Top piece</th>
            <th>Middle piece</th>
            <th>Bottom piece</th>
        </tr>
        <tr>
            <td>11a</td>
            <td class="holdings"><img src="/data/11a-0.jpeg" title="11a-0"/> <br /><?php echo $cards['elevena0']; ?></td>
            <td class="holdings"><img src="/data/11a-1.jpeg" title="11a-1"/> <br /><?php echo $cards['elevena1']; ?></td>
            <td class="holdings"><img src="/data/11a-2.jpeg" title="11a-2"/> <br /><?php echo $cards['elevena2']; ?></td>
        </tr>
        <tr>
            <td>11b</td>
            <td class="holdings"><img src="/data/11b-0.jpeg" title="11b-0"/> <br /><?php echo $cards['elevenb0']; ?></td>
            <td class="holdings"><img src="/data/11b-1.jpeg" title="11b-1"/> <br /><?php echo $cards['elevenb1']; ?></td>
            <td class="holdings"><img src="/data/11b-2.jpeg" title="11b-2"/> <br /><?php echo $cards['elevenb2']; ?></td>
        </tr>

        <tr>
            <td>11c</td>
            <td class="holdings"><img src="/data/11c-0.jpeg" title="11c-0"/> <br /><?php echo $cards['elevenc0']; ?></td>
            <td class="holdings"><img src="/data/11c-1.jpeg" title="11c-1"/> <br /><?php echo $cards['elevenc1']; ?></td>
            <td class="holdings"><img src="/data/11c-2.jpeg" title="11c-2"/> <br /><?php echo $cards['elevenc2']; ?></td>
        </tr>
        <tr>
            <td>13c</td>
            <td class="holdings"><img src="/data/13c-0.jpeg" title="13c-0"/> <br /><?php echo $cards['thirteenc0']; ?></td>
            <td class="holdings"><img src="/data/13c-1.jpeg" title="13c-1"/> <br /><?php echo $cards['thirteenc1']; ?></td>
            <td class="holdings"><img src="/data/13c-2.jpeg" title="13c-2"/> <br /><?php echo $cards['thirteenc2']; ?></td>
        </tr>
        <tr>
            <td>13d</td>
            <td class="holdings"><img src="/data/13d-0.jpeg" title="13d-0"/> <br /><?php echo $cards['thirteend0']; ?></td>
            <td class="holdings"><img src="/data/13d-1.jpeg" title="13d-1"/> <br /><?php echo $cards['thirteend1']; ?></td>
            <td class="holdings"><img src="/data/13d-2.jpeg" title="13d-2"/> <br /><?php echo $cards['thirteend2']; ?></td>
        </tr>
        <tr>
            <td>26h</td>
            <td class="holdings"><img src="/data/26h-0.jpeg" title="26h-0"/> <br /><?php echo $cards['twentysixh0']; ?></td>
            <td class="holdings"><img src="/data/26h-1.jpeg" title="26h-1"/> <br /><?php echo $cards['twentysixh1']; ?></td>
            <td class="holdings"><img src="/data/26h-2.jpeg" title="26h-2"/> <br /><?php echo $cards['twentysixh2']; ?></td>
        </tr>
    </table>
</div>

