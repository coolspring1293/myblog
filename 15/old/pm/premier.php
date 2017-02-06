<?php
/*{"_links":{
	"self":{
		"href":"http://api.football-data.org/v1/soccerseasons/398/leagueTable/?matchday=32"},
		"soccerseason":{"href":"http://api.football-data.org/v1/soccerseasons/398"}},
		"leagueCaption":"Premier League 2015/16",
		"matchday":32,
		"standing":
			[{
				"_links":{
					"team":{"href":"http://api.football-data.org/v1/teams/338"}
				},
				"position":1,
				"teamName":"Leicester City FC",
				"crestURI":"http://upload.wikimedia.org/wikipedia/en/6/63/Leicester02.png",
				"playedGames":32,
				"points":69,
				"goals":55,
				"goalsAgainst":31,
				"goalDifference":24,
				"wins":20,
				"draws":9,
				"losses":3,
				"home":{"goals":26,"goalsAgainst":15,"wins":10,"draws":5,"losses":1},
				"away":{"goals":29,"goalsAgainst":16,"wins":10,"draws":4,"losses":2}
			},{
				"_links":{
					"team":{"href":"http://api.football-data.org/v1/teams/73"}
				},
				"position":2,
				"teamName":"Tottenham Hotspur FC",
				"crestURI":"http://upload.wikimedia.org/wikipedia/de/b/b4/Tottenham_Hotspur.svg",
				"playedGames":32,
				"points":62,
				"goals":57,
				"goalsAgainst":25,
				"goalDifference":32,
				"wins":17,
				"draws":11,
				"losses":4,
				"home":{"goals":30,"goalsAgainst":12,"wins":9,"draws":5,"losses":2},
				"away":{"goals":27,"goalsAgainst":13,"wins":8,"draws":6,"losses":2}
			}*/
header("Content-Type: text/html; charset=UTF-8");
    $url = 'http://api.football-data.org/v1/soccerseasons/398/leagueTable/?matchday=32';
    $reqPrefs['http']['method'] = 'GET';
    $reqPrefs['http']['header'] = 'X-Auth-Token: 99ed5ff3ba2a4d9191d6aea496bee971';
    $stream_context = stream_context_create($reqPrefs);
    $response = file_get_contents($url, false, $stream_context);
    $fixtures = json_decode($response);
    echo "<h1>$fixtures->leagueCaption</h1>";
    echo "<h2>Matchday: $fixtures->matchday</h2>";
	echo '<table border="1">
	<tr>
	<th>Position</th>
	<th>TeamName</th>
	<th>URI</th>
	<th>PlayedGames</th>
	
	<th>Wins</th>
	<th>Draws</th>
	<th>Losses</th>
	<th>GoalsAgainst</th>
	<th>GoalDifference</th>
	<th>Points</th>
	</tr>';

	for ($i=0; $i < 20; $i++) { 
	$tmp = $fixtures->standing[$i];
	echo "<tr>
		<td>$tmp->position</td>
		<td><a href=\"team.php?teamurl=" . $tmp->_links->team->href . "\">$tmp->teamName</a></td>
		<td><img src=\"" . $tmp->crestURI . "\"height='50'/></td>
		<td>$tmp->playedGames</td>
		
		<td>$tmp->wins</td>
		<td>$tmp->draws</td>
		<td>$tmp->losses</td>


		<td>$tmp->goalsAgainst</td>
		<td>$tmp->goalDifference</td>

		<td>$tmp->points</td>
		</tr>";
	}

	echo "</table>";
?>