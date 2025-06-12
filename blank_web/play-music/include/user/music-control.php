<div class="music-control">
	<div class="left-control">
        <div class="song-picture-container">
			<img id="song-picture" src="/play-music/media/image/items/music-disc.png" width="40px"/>
        </div>
        <div class="song-content-container">
			<div id="song-content">
			</div>
        </div>
	</div>
	<div class="center-control" align="center">
		<div class="control-button">
			<div id="random" class="control-button-hover" style="margin: 0px 10px 0px 10px">
				<span class="fa-solid fa-random"></span>
			</div>
			<div id="backward" class="control-button-hover" style="margin: 0px 10px 0px 10px">
				<span class="fa-solid fa-backward"></span>
			</div>
			<div id="pause" class="control-button-hover" style="margin: 0px 10px 0px 10px">
				<span class="fa-solid fa-play"></span>
			</div>
			<div id="forward" class="control-button-hover" style="margin: 0px 10px 0px 10px">
				<span class="fa-solid fa-forward"></span>
			</div>
			<div id="repeat" class="control-button-hover" style="margin: 0px 10px 0px 10px">
				<span class="fa-solid fa-repeat"></span>
			</div>
		</div>
		<div class="control-bar">
			<div align="right">
				<span id="current-time">00:00 </span>
			</div>
			<div style="padding: 0px 7px 0px 7px;">
				<audio id="player" src=""></audio>
				<input type="range" id="time-bar" value="0" min="0" max="100" style="width: 100%;">
			</div>
			<div align="left">
				<span id="full-time"> 00:00</span>
			</div>
		</div>
	</div>
	<div class="right-control">
		<div id="heart" class="control-button-hover" style="padding:12px 20px 0px 0px;">
			<span class="fa-solid fa-heart" style="font-size: 30px;"></span>
		</div>
		<div class="control-button-hover" id="volume-icon" style="padding:12px 5px 0px 0px; width: 40px;">
			<span class="fa-solid fa-volume-down" style="font-size: 30px;"></span>
		</div>
		<div class="volume-bar-sm-screen" style="padding:20px 5px 0px 0px;">
			<input type="range" id="volume-bar" value="50" min="0" max="100" style="width: 100%;">
		</div>
	</div>
</div>