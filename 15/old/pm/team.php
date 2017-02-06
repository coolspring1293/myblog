<?php
/*
{"_links":{
"self":{"href":"http://api.football-data.org/v1/teams/338"},
"fixtures":{"href":"http://api.football-data.org/v1/teams/338/fixtures"},
"players":{"href":"http://api.football-data.org/v1/teams/338/players"}},
"name":"Leicester City FC",
"code":"LCFC",
"shortName":"Foxes",
"squadMarketValue":"95,500,000 €",
"crestUrl":"http://upload.wikimedia.org/wikipedia/en/6/63/Leicester02.png"}
*/
header("Content-Type: text/html; charset=UTF-8");

$teamurl=$_GET['teamurl'];
    $url = $teamurl;
    $reqPrefs['http']['method'] = 'GET';
    $reqPrefs['http']['header'] = 'X-Auth-Token: 99ed5ff3ba2a4d9191d6aea496bee971';
    $stream_context = stream_context_create($reqPrefs);
    $response = file_get_contents($url, false, $stream_context);
    $fixtures = json_decode($response);
    
    //var_dump($fixtures);
    echo "<h1>$fixtures->name</h1>";
    echo '<img src="'. $fixtures->crestUrl .'" width="250"> <br/> ';
    echo "<h2>Short: $fixtures->code</h2>";
    echo "<h2>Nickname: $fixtures->shortName</h2>";
    echo "<h2>Squad Market Value: $fixtures->squadMarketValue</h2>";

    $team_fixtures_url = $fixtures->_links->fixtures->href;
    $team_players_url = $fixtures->_links->players->href;

    //Why is hard to get the HTTP resquest?
    $f_res = file_get_contents($team_fixtures_url , false, $stream_context);
    $f_fix = json_decode($f_res);


    
    $p_res = file_get_contents($team_players_url , false, $stream_context);
    $p_fix = json_decode($p_res);

    //var_dump($f_fix);

    $f_c = $f_fix->count;
    $p_c = $p_fix->count;


    /*
				"date":"2015-08-08T14:00:00Z",
				"status":"FINISHED",
				"matchday":1,
				"homeTeamName":"Leicester City FC",
				"awayTeamName":"Sunderland AFC",
				"result":{"goalsHomeTeam":4,"goalsAwayTeam":2}
    */

	echo '<table border="1">
	<tr>
	<th>Date</th>
	<th>Status</th>
	<th>League</th>
	<th>Matchday</th>
	<th>HomeTeamName</th>
	
	<th>Tesult</th>
	<th>AwayTeamName</th>
	</tr>';


    for ($i=0; $i < $f_c; $i++) { 
    	echo "<tr>";
    	$tmp = $f_fix->fixtures[$i];
    	//var_dump($tmp);
    	echo "<th>$tmp->date</th>";
    	echo "<th>$tmp->status</th>";

    	$league_url = $tmp->_links->soccerseason->href;
    	$l_res = file_get_contents($league_url , false, $stream_context);
   		$l_fix = json_decode($l_res);

   		echo "<th>".$l_fix->caption."</th>";

    	echo "<th>$tmp->matchday  </th>";
    	echo "<th><a href=\"team.php?teamurl=" . $tmp->_links->homeTeam->href ."\">$tmp->homeTeamName</a></th>";
    	
    	
    	$p_res = $tmp->result;
    	if($p_res == NULL)
    	{
    		echo "<th> - : - </th>";
    	}
    	else 
    	{
    		echo "<th> $p_res->goalsHomeTeam : $p_res->goalsAwayTeam </th> ";
    	}
    	
    	echo "<th><a href=\"team.php?teamurl=" . $tmp->_links->awayTeam->href . "\">$tmp->awayTeamName</a></th></tr>";
    }

    /*
		"name":"Gökhan Inler",
		"position":"Central Midfield",
		"jerseyNumber":33,
		"dateOfBirth":"1984-06-27",
		"nationality":"Switzerland",
		"contractUntil":"2018-06-30",
		"marketValue":"7,500,000 €"
	},{
    */

    echo '</table> <br/> 
    <table border="2">
    <th>name</th>
    <th>position</th>
    <th>jerseyNumber</th>
    <th>dateOfBirth</th>
    <th>nationality</th>
    <th>contractUntil</th>
    <th>marketValue</th></tr>';

	for ($i=0; $i < $p_c; $i++) { 
    	echo "<tr>";
    	$tmp = $p_fix->players[$i];
    	//var_dump($tmp);
    	echo "<td>$tmp->name</td>";
    	echo "<td>$tmp->position</td>";
    	echo "<td>$tmp->jerseyNumber</td>";
    	echo "<td>$tmp->dateOfBirth</td>";
    	echo "<td>$tmp->nationality</td>";
    	echo "<td>$tmp->contractUntil</td>";
    	echo "<td>$tmp->marketValue</td></tr>";
    }

    echo "</table>";
    




?>
