// Problem: User interaction doesn't provide desired results.
// Solution: Add interactivity so the user can manage daily tasks.

/*================ GLOBAL VARIABLES ADDED AT THE TOP ====================*/

var taskInput = document.getElementById('new-task'); // new-task
var addButton = document.getElementsByTagName("button")[0]; // first button
var incompleteTasksHolder = document.getElementById('incomplete-tasks'); // incomplete-tasks
var completedTasksHolder = document.getElementById('completed-tasks'); //completed-tasks


/*================ EXPLANATION ====================*/
/*
Variables have been added at the top, functions as event handlers below
Each event that we want to take action on has an event handler to make it do something
Functions are created for each action that occurs, and every action that the script must do
They are not binded to the buttons u ntil the end
*/

/*================ FUNCTION TO CREATE A NEW TASK, TAKING THE STRING AS A PARAMETER ====================*/

var createNewTaskElement = function(taskString) {

  /*================ CREATING LIST ITEM ELEMENTS AND ASSIGNING TO VARIABLES ====================*/
  /*================ VARIABLES CREATE, BUT NOT CALLED OR RETURNED ====================*/
  //Create list item
  var listItem = document.createElement("li");

  // input (checkbox)
  var checkBox = document.createElement("input"); //checkbox
    // label
  var label = document.createElement("label");
    // input (text)
  var editInput = document.createElement("input");
    // button.edit
  var editButton = document.createElement("button");
    // button.delete
  var deleteButton = document.createElement("button");


  /*================ CHANGING TYPE, DEFAULT CONTENT AND CLASSES OF ALL INPUTS ====================*/

    // Each element, needs modifing

  checkBox.type = "checkbox";
  editInput.type = "text";
  editButton.innerHTML = "Edit";
  editButton.className = "edit";
  deleteButton.innerHTML = "Delete";
  deleteButton.className = "delete";
  label.innerText = taskString;

  /*================ APPENDS NEW ELEMENTS TO THE NEW LIST ITEM USING VARIABLES DECLARED ABOVE ====================*/

    //Each element needs appending
  listItem.appendChild(checkBox);
  listItem.appendChild(label);
  listItem.appendChild(editInput);
  listItem.appendChild(editButton);
  listItem.appendChild(deleteButton);

  return listItem;
}


/*================ EVENT HANDLER FOR NEW TASK BUTTON PRESS ====================*/

// Add a new task
var addTask = function() {

  console.log("Add task...");

  // Create a new list item with the text from #new-task:
  if(taskInput.value != "") {

    var listItem = createNewTaskElement(taskInput.value);
    //Append listItem to incompleteTasksHolder
    incompleteTasksHolder.appendChild(listItem);
    bindTaskEvents(listItem, taskCompleted);

    taskInput.value = "";

  };

}

// Edit an existing task
var editTask = function() {
  console.log("Edit task...");

  var  listItem = this.parentNode;

  var editInput = listItem.querySelector("input[type=text]");
  var label = listItem.querySelector("label");

  var containsClass = listItem.classList.contains("editMode");

  var editButton = this;

  // if the class of the parent is .editMode
  if (containsClass) {
    // Switch from .editMode
    // label text become the input's value
    label.innerText = editInput.value;
    editButton.innerHTML = "Edit";
  } else {
    // Switch to .editMode
    // input value becomes the label's text
    editInput.value = label.innerText;
    editButton.innerHTML = "Save";
  }

  // Toggle .editMode on the list item
  listItem.classList.toggle("editMode");

}

// Delete an existing task
var deleteTask = function() {
  console.log("Delete task...");
  var listItem = this.parentNode;
  var ul = listItem.parentNode;

  // Remove the parent list item from the list
  ul.removeChild(listItem);
}

// Mark a task as complete
var taskCompleted = function() {
  console.log("Complete task...");
    // Append the task list item to the #completed-tasks
  var listItem = this.parentNode;
  completedTasksHolder.appendChild(listItem);
  bindTaskEvents(listItem, taskIncomplete);
}

// Mark a task as incomplete
var taskIncomplete = function() {
  console.log("Task incomplete...");
    // Append the task list item to the #incomplete-tasks
  var listItem = this.parentNode;
  incompleteTasksHolder.appendChild(listItem);
  bindTaskEvents(listItem, taskCompleted);
}







var bindTaskEvents = function(taskListItem, checkBoxEventHandler) {

  console.log("Bind list item events");
  // select taskListItem's children
  var checkBox = taskListItem.querySelector("input[type=checkbox]");
  var editButton = taskListItem.querySelector("button.edit");
  var deleteButton = taskListItem.querySelector("button.delete");

    //bind editTask to edit button
  editButton.onclick = editTask;

    //bind deleteTask to delete button
  deleteButton.onclick = deleteTask;

    //bind taskCompleted to checkbox
  checkBox.onchange = checkBoxEventHandler;
}

var ajaxRequest = function() {
  console.log("AJAX Request");
}

/*================ BIND THE ADD TASK BUTTON TO THE RELEVANT EVENT HANDLERS ====================*/

// Set the click handler to the addTask function

addButton.onclick = addTask;
addButton.addEventListener("click", addTask);
addButton.addEventListener("click", ajaxRequest);

//addButton.onclick = ajaxRequest;


/*================ FOR LOOPS TO CYCLE OVER ALL EXISTING AND NEW TASKS THAT HAVE BEEN ADDED ====================*/
/* This is needed to rerun the binding functions whenever new tasks are added.
Otherwise the code would be static, and any new task items wouldn't have working buttons,
because the script would have finished running before they were added.*/


// cycle over incompleteTasksHolder ul list items
for (var i = 0; i < incompleteTasksHolder.children.length; i++) {
  //bind events to list item's children (taskCompleted)
  bindTaskEvents(incompleteTasksHolder.children[i], taskCompleted);
}

// cycle over completedTasksHolder ul list items
for (var i = 0; i < completedTasksHolder.children.length; i++) {
  //bind events to list item's children (taskIncomplete)
  bindTaskEvents(completedTasksHolder.children[i], taskIncomplete);
}
