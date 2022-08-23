const fields = document.querySelectorAll(".game__field");
const results = document.querySelector(".game__results");
const turn = document.querySelector(".game__turn");
let player = 1;
let player1fields = [];
let player2fields = [];
let winner = 0;
let available_cells = [99, 98, 97, 96, 95, 94, 93, 92, 91, 90];

let bestPlayerCombs = [];
let bestBotCombs = [];

const winCombs = [];

/** function for creating array with all available winning combinations
 *  stepDiff - step for next cell in combination
 *  start - index of starting cell in combination (0 by default)
 *  xlimit - limit of horizontal iteration
 *  ylimit -  limit of vertical iteration
 * */


const createCombs = function (stepDiff, start = 0) {
  let xlimit = 10;
  let ylimit = 10;
  if (stepDiff == 1) {
    xlimit = 7;
  } else if (stepDiff == 10) {
    ylimit = 7;
  } else if (stepDiff == 11) {
    ylimit = 7;
    xlimit = 7;
  } else if (stepDiff == 9) {
    ylimit = 7;
  }
  for (let y = 0; y < ylimit; y += 1) {
    for (let x = 0 + start; x < xlimit; x++) {
      let win = [];
      for (let n = 0; n < 4; n += 1) {
        win.push(y * 10 + x + n * stepDiff);
      }
      winCombs.push(win);
    }
  }
};

//creation of all 4 directions of winning combos
createCombs(1); //horizontal combinations
createCombs(10); //vertical combinations
createCombs(11); //diagonal from top-left to bottom-right combinations
createCombs(9, 3); //diagonal from top-right to bottom-left combinations

//highlights all available cells to choose
const showAvailable = function () {
  fields.forEach((field) => {
    field.classList.remove("available");
  });
  for (let avail of available_cells) {
    fields[avail].classList.add("available");
  }
};
showAvailable();

//reset game by reloading page
const reset = function (evt) {
  location.reload();
};

// creating array with possible player 1 future combinations and sorting them by completeness
const checkPlayerCombos = function () {
  for (let combIndex in winCombs) {
    let counter = 0;
    for (let cell of player1fields) {
      if (winCombs[combIndex].includes(cell)) {
        counter++;
      }
    }
    bestPlayerCombs.push({ index: combIndex, rating: counter });
  }
  for (let comb of bestPlayerCombs) {
    for (let blocked of player2fields) {
      if (winCombs[comb.index].includes(blocked)) {
        bestPlayerCombs = bestPlayerCombs.filter((el) => {
          return el.index != comb.index;
        });
      }
    }
  }

  bestPlayerCombs.sort(function (a, b) {
    return b.rating - a.rating;
  });
};

// creating array with possible player BOT future combinations and sorting them by completeness
const checkBotCombos = function () {
  for (let combIndex in winCombs) {
    let counter = 0;
    for (let cell of player2fields) {
      if (winCombs[combIndex].includes(cell)) {
        counter++;
      }
    }
    if (counter == 3) {
      bestBotCombs.push({ index: combIndex, rating: counter });
    }
  }
  for (let comb of bestBotCombs) {
    for (let blocked of player1fields) {
      if (winCombs[comb.index].includes(blocked)) {
        bestBotCombs = bestBotCombs.filter((el) => {
          return el.index != comb.index;
        });
      }
    }
  }
};

// fill cell with corresponding symbol
const fill = function () {
  if (player == 1) {
    return "X";
  } else if (player == 2) {
    return "O";
  } else return "";
};

// checks players for completed combination
const winCheck = function () {
  if (player == 1) {
    let counter = 0;
    for (let comb of winCombs) {
      counter = 0;
      for (let value of comb) {
        if (player1fields.includes(value)) {
          counter++;
        }
        if (counter == 4) {
          winComb = comb;
          winner = 1;
        }
      }
    }
  } else if (player == 2) {
    let counter = 0;
    for (let comb of winCombs) {
      counter = 0;
      for (let value of comb) {
        if (player2fields.includes(value)) {
          counter++;
        }
        if (counter == 4) {
          winComb = comb;
          winner = 2;
        }
      }
    }
  }
  if (winner > 0) {
    results.innerText = "Winner is player " + winner;
    player = 0;
    for (let value of winComb) {
      fields[value].classList.add("comb");
    }
  }
};
//switch players turn
const change = function () {
  if (player == 1) {
    player = 2;
  } else if (player == 2) {
    player = 1;
  }
  turn.textContent = player;
  showAvailable();
};

//(bot): bots turn with decision for best cell to block player 1 combinations
const botTurn = function () {
  if (player == 2) {
    if (bestBotCombs.length > 0) {
      for (let comb of bestBotCombs) {
        for (let avail of available_cells) {
          if (winCombs[comb.index].includes(avail)) {
            return fields[avail].click();
          }
        }
      }
    }
    for (let comb of bestPlayerCombs) {
      for (let avail of available_cells) {
        if (winCombs[comb.index].includes(avail)) {
          return fields[avail].click();
        }
      }
    }
  }
};

// bot random step on available cells
//
// const botTurn = function () {
//   if (player == 2) {
//     const randField = Math.floor(Math.random() * available_cells.length);
//     fields[available_cells[randField]].click();
//   }
// };

//adding all clicking logic to cells
fields.forEach((el, index) => {
  el.onclick = function (evt) {
    if (!this.firstChild.innerText && available_cells.includes(index)) {
      if (player == 1) {
        player1fields.push(index);
        checkPlayerCombos();
      } else if (player == 2) {
        player2fields.push(index);
        checkBotCombos();
      }
      this.firstChild.innerText = fill();
      if (index >= 10) {
        available_cells.push(index - 10);
      }
      available_cells.splice(available_cells.indexOf(index), 1);

      winCheck();
      change();
      botTurn();
    }
  };
});

