  <div class="row">
    <div class="col-sm-4">
      <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title">Enter a search term</h3>
            </div>
            <div class="panel-body">
  <form method="post">
    <input type='text' id="search_text" name="id" value='wurl_playback_test'>
    <input type='hidden' name="access_token" value="<?=urlencode($_REQUEST['access_token'])?>">
    <input type='submit' value="Go">
  </form>
            </div>
       </div> <!-- Panel -->
    </div>
    <div class="col-sm-4">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title">Try searching one of these</h3>
            </div>
            <div class="panel-body">
  
  <select id="change_text" onchange="document.getElementById('search_text').value = document.getElementById('change_text').value;">
  <? 
  /** This large array provides a sample of the shows we have bridge results for. */ ?>
    <? foreach (array(
"12_years_a_slave", "19_kids_and_counting", "24_live_another_day", "24_season_one", "2_broke_girls",
"47_ronin", "60_minutes", "about_a_boy", "about_time",
"alaska_the_last_frontier", "ali_g_rezurection", "amerian_hustle", "american_dream_builders",
"american_ninja_warrior", "american_pickers", "american_restoration", "americas_got_talent",
"americas_next_top_model", "anchorman_2_the_legend_continues", "anger_management", "animation_domination_high-def",
"arrow", "at_midnight", "august_osage_county", "bad_ink",
"barryd_treasure", "bates_motel", "beauty_and_the_beast", "believe", "bering_sea_gold",
"beyond_scared_straight", "big_brother", "big_rig_bounty_hunters", "big_smo", "bikerlive",
"black_nativity", "breaking_bad", "breaking_boston", "bring_it", "brooklyn_nine-nine",
"ceelo_greens_the_good_life", "chasing_life", "chicago_fire", "chicago_pd",
"chopped", "chrisley_knows_best", "cold_justice", "comic_book_men", "community",
"conan", "covert_affairs", "criminal_minds", "crisis", "crossbones",
"csi_crime_scene_investigation", "cutthroat_kitchen", "dallas", "dallas_buyers_club", "dance_moms",
"dateline", "days_of_our_lives", "deadliest_catch", "defiance", "delivery_man",
"devious_maids", "dominion", "dracula", "drop_dead_diva", "drunk_history",
"dual_survival", "duck_dynasty", "dude_youre_screwed", "enlisted", "enough_said",
"escape_plan", "extant", "extra", "face_off", "falling_skies",
"fargo", "fast_n_loud", "flipping_boston", "flipping_vegas", "food_networ_star",
"franklin__bash", "frozen", "fruitvale_station", "funniest_wins", "gambit",
"game_of_arms", "gang_related", "gimme_shelter", "gold_rush", "graceland",
"gravity", "grimm", "growing_up_fisher", "guys_grocery_games", "halt_and_catch_fire",
"hannibal", "hell_on_wheels", "hells_kitchen", "here_comes_honey_boo_boo", "heroes_of_cosplay",
"hollywood_game_night", "homefront", "house_hunters", "house_hunters_international", "how_i_met_your_mother",
"i_found_the_gown", "iron_man_3", "its_always_sunny_in_philadelphia", "jimmy_kimmel_live", "joe",
"kate_plus_8", "key__peele", "labor_day", "last_call_carson_daly", "last_comic_standing",
"late_night_with_seth_meyers", "late_night_with_seth_myers", "late_show_with_david_letterman", "law__order_criminal_intent",
"lee_daniels_the_butler", "little_women_la", "longmire", "louie",
"major_crimes", "mandela_long_walk_to_freedom", "married", "masterchef", "meet_the_press",
"michael_j_fox_show", "mike__molly", "moonshiners", "mountain_men", "murder_in_the_first",
"my_big_fat_american_gypsy_wedding", "mystery_girls", "mythbuster", "naked_and_afraid", "nathan_for_you",
"ncis", "ncis_los_angeles", "new_girl", "now_you_see_me", "parenthood",
"parks_and_recreation", "pawn_stars", "percy_jackson_sea_of_monsters", "pete_holmes_show",
"philomena", "playing_house", "pretty_little_liars", "prisoners",
"property_brothers", "rake", "reckless", "restaurant_impossible", "revolution",
"ride_along", "rising_star", "rizzoli__isles", "royal_pains",
"saving_mr_banks", "say_yes_to_the_dress", "seeking_a_friend_for_the_end_of_the_world",
"shipping_wars", "sister_wives", "small_town_secutiry", "so_you_think_you_can_dance",
"sons_of_guns", "south_park", "steve_harvey", "storage_wars",
"suits", "sullivan__son", "supernatural", "swamp_people",
"switched_at_birth", "talking_dead", "taxi_brooklyn", "the_100",
"the_big_bang_theory", "the_biggest_loser", "the_blacklist", "the_book_thief",
"the_bridge", "the_counselor", "the_ellen_degeneres_show", "the_first_48",
"the_fosters", "the_goldbergs", "the_good_wife", "the_half_hour",
"the_hobbit_the_desolation_of_smaug", "the_hunger_games_catching_fire", "the_hunt",
"the_killer_speaks", "the_last_ship", "the_late_late_show_with_craig_ferguson",
"the_league", "the_legend_of_hercules", "the_mentalist",
"the_michael_j_fox_show", "the_mindy_project", "the_night_shift",
"the_nut_job", "the_office", "the_originals",
"the_real_housewives_of_new_jersey", "the_real_housewives_of_new_york_city",
"the_real_housewives_of_orange_county", "the_revolution",
"the_secret_life_of_walter_mitty", "the_simpsons",
"the_strain", "the_tonight_show_starring_jimmy_fallon",
"the_vampire_diaries", "the_voice", "the_walking_dead", "the_will_wheaton_project",
"the_wolf_of_wall_street", "the_wolverine", "thor_the_dark_world", "tlc",
"today", "toddlers__tiaras", "top_gear", "tosh0",
"turn", "twisted", "tyrant", "undateable", "under_the_dome",
"undercover_boss", "unforgettable", "wahlburgers", "welcome_to_sweden",
"were_the_millers", "whitecollar", "whose_line_is_it_anyway", "wilfred",
"winters_tale", "witches_of_east_end", "working_the_engels", "young__hungry",
"youre_the_worst", "yukon_men"     
    ) as $item) {?>
      <option value="<?=$item?>"><?=$item?></option>
    <? } ?>
  </select></p>
              </div>
          </div>
    </div>
    </div> <!-- row -->

