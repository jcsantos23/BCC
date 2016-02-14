<form method="post">
    <div class="player-select">
        <label for="player">Player</label>
        <select name = pname>
            <option value="player1">Mickey</option>
            <option value="player2">Donald</option> 
            <option value="player3">George</option>
            <option value="player4">Henry</option>
        </select>
    </div>
</form> 
<div class="alone"></div>
<div class="left-panel">
    <label for="recent-act">Player's Recent Activity</label>
    {ptable}
</div>
<div class="right-panel">
    <label for="holdings">Current Holdings</label>
    {ptable2}
</div>
<input type="submit" value="Submit" name="formSubmit"> 