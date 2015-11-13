"use strict";

(function(factory) {

    //-----------------------------------
    // DECLARING VARIABLES
    //-----------------------------------

    var userNameInput = document.getElementById("user-name");
    var userName = '';
    var nameConfirmBtn = document.getElementById("submit-name");
    var pokemonSelectContainer = document.getElementById("starting-pokemon-select");
    var setNameContainer = document.getElementById("set-name");
    var inputError = document.getElementsByClassName("input-error")[0];
    var starterPokemonOptions = document.getElementsByClassName("pokemon-select-option");
    var player;


    // Put this into a JSON file and use AJAX
    var charmander = {
        name: 'charmander',
        moves: {
            'Scratch': {
                power: 40,
                accuracy: 100
            },
            'Inferno': {
                power: 100,
                accuracy: 50
            }
        },
        hp: 188
    };

    var squirtle = {
        name: 'squirtle',
        moves: {
            'Tackle': {
                power: 50,
                accuracy: 100
            },
            'Mega Punch': {
                power: 80,
                accuracy: 85
            }
        },
        hp: 198
    };

    var bulbasaur = {
        name: 'bulbasaur',
        moves: {
            'Tackle': {
                power: 50,
                accuracy: 100
            },
            'Seed Bomb': {
                power: 80,
                accuracy: 100
            }
        },
        hp: 200
    };



    //-----------------------------------
    // RUN THE GAME
    //-----------------------------------

    function PokemonGame () {
        // Build canvas here
    };



    //-----------------------------------
    // POKEMON
    //-----------------------------------

    // Feed AJAX into this?
    function Pokemon(name, id, moves, hp) {
        this.name = name;
        this.id = id;
    };

    // Constructor for pokemon moves
    Pokemon.prototype.PokemonMoves = function(moves, attackName, attackPoints, attackAccuracy) {
        this.attackName = attackName;
        this.attackPoints = attackPoints;
        this.attackAccuracy = attackAccuracy;
    };

    // Pokemon attack
    Pokemon.prototype.Attack = function(attackName) {
        this.pokemonMoves(attackName)
    };



    //-----------------------------------
    // THE PLAYER
    //-----------------------------------

    // Register current player
    // No need to use prototypes to add methods, because only one should be created
    var CurrentPlayer = function(playerName) {
        this.playerName = playerName;
        // this.gender = gender;
        this.starterPokemon = '';
        this.carriedPokemon = [];
    };

    CurrentPlayer.prototype.CarriedPokemon = function() {};
    // CurrentPlayer.prototype.currentPokemon

    var addPokemon = function(pokemon) {
        player.carriedPokemon.push(pokemon);
    }



    //-----------------------------------
    // SETTING UP THE PLAYER
    //-----------------------------------

    // Submit the typed username and check for errors before proceeding
    function submitUsername () {
        // Hide error
        inputError.classList.remove("is-visible");

        // Make sure player hasn't already been made
        if (typeof player === "undefined") {
            // Test username. Display error if not valid
            if (/^[\s\w]{1,10}$/.test(userNameInput.value) && userNameInput.value.length <= 10) {
                // Display the next step
                pokemonSelectContainer.classList.add("is-visible");
                setNameContainer.classList.remove("is-visible");
                player = new CurrentPlayer(userNameInput.value);
                console.log("Player " + userNameInput.value + " added");

            } else {
                inputError.classList.add("is-visible");
            }
        }

    };

    function chooseStarterPokemon() {

        // Make sure player hasn't already chosen pokemon
        if (player.starterPokemon === '') {

            var chosenPokemon = '';

            switch(this.id) {
                case "select-charmander":
                default:
                chosenPokemon = "Charmander";
                addPokemon(charmander);
                break;
                case "select-squirtle":
                chosenPokemon = "Squirtle";
                addPokemon(squirtle);
                break;
                case "select-bulbasaur":
                chosenPokemon = "Bulbasaur";
                addPokemon(bulbasaur);
                break;
            };

            player.starterPokemon = chosenPokemon;
            console.log('Starter pokemon is ' + chosenPokemon);
            console.log(player.carriedPokemon);

        }
    };



    //-----------------------------------
    // EVENTS
    //-----------------------------------

    nameConfirmBtn.addEventListener("click", submitUsername, false);
    for (var i=0; i<starterPokemonOptions.length; i+=1) {
        starterPokemonOptions[i].addEventListener("click", chooseStarterPokemon, false); // Use event delegation?
    };


}());


// PROGRAM STEPS

// 1. Select name
// 2. Select starter pokemon
// 3. Create current user object
// 4. Add start pokemon to current user

//-----------------------------------

// PLANS AND NOTES

// Create some pokemon in this file, instead of using JSON. Or make your own small JSON file to pull from.
// Look up info about each stat. Don't go too in depth though!

// ON-CLICK - Add starting pokemon to carriedPokemon
// Use AJAX or CSS to bring up selection
// Remove with JS after selection

// Need a constructor function for the main game
// Need a current map function/object - AJAX?
// Change his/her in wording based on gender
// Need a user interface with HTML - canvas?
// Collision detection
// Move map on motion
// Define possible interactions, including collisions (coordinates)
// Need resources for map image, player movement and all other components
//
// Need a resource library of pokemon and their attributes - AJAX??
// Have a boolean for starter pokemon?
// Need a record of the user's progress and store info (name, gender)
// His pokemon and their health, level etc.
//
// Need a fight sequence that takes over the screen, takes methods for when a player attacks
// These attacks need info from the Pokemon + Player
// Needs to be math generated interactions
// Chance of attack landing
// Chance of fleeing
// Take into account strength of pokemon?
// Chance of catching pokemon (strength of pokeball, strength of pokemon, HP of pokemon)

// Figure out how to make individual instances of pokemon...
// Use a constructor, with the new keyword to create an instance?
// e.g. Each pokemon used in the game has it's own object prototype,
// then inherit those properties to create 'pokemon1' with name as a property on that

//-----------------------------------


// FUTURE IMPROVEMENTS

// Make the initial selection of name and pokemon using a form, then submit the data to a database
// Allow these settings to be fetched when the user comes back to play again?
// Use object.create?
// Take ideas from game in local folder on PC


// JSFIDDLE
// http://jsfiddle.net/nafL94c9/(version-number)

// ORIGINAL IMAGE LINKS
// http://cdn.bulbagarden.net/upload/thumb/7/73/004Charmander.png/96px-004Charmander.png
// http://cdn.bulbagarden.net/upload/thumb/3/39/007Squirtle.png/144px-007Squirtle.png
// http://cdn.bulbagarden.net/upload/thumb/2/21/001Bulbasaur.png/96px-001Bulbasaur.png


//http://pokeapi.co/

/* var canvas = document.createElement("canvas");
var ctx = canvas.getContext("2d");
canvas.width = 512;
canvas.height = 480;
document.body.appendChild(canvas);
ctx.fillStyle = "#FF0000";
ctx.fillRect(0,0,150,75); */
