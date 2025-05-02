<?php
session_start();




?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">

    <title>To-Do List</title>
    <style>
      

        

        .todo-container {
            background-color: white;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin: 40px;
        }

        .input-group {
            display: flex;
            margin-bottom: 20px;
        }

        #task-input {
            flex-grow: 1;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px 0 0 4px;
            font-size: 16px;
        }

        #add-button {
            padding: 10px 15px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 0 4px 4px 0;
            cursor: pointer;
            font-size: 16px;
        }

        #add-button:hover {
            background-color: #45a049;
        }

        ul {
            list-style-type: none;
            padding: 0;
        }

        li {
            padding: 10px;
            border-bottom: 1px solid #eee;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        li:last-child {
            border-bottom: none;
        }

        .completed {
            text-decoration: line-through;
            color: #888;
        }

        .delete-btn {
            background-color: #f44336;
            color: white;
            border: none;
            padding: 5px 10px;
            border-radius: 3px;
            cursor: pointer;
        }

        .delete-btn:hover {
            background-color: #d32f2f;
        }
    </style>
</head>
<body>
<div class="box">
        <h1>Welcome , <span><?php echo $_SESSION['name'];?></span></h1>
        <p>This is an <span>User</span>Page</p>
        <button onclick="window.location.href='logout.php'">Logout</button>

    </div>
    <div class="todo-container">
        <h1>To-Do List</h1>
        
        <div class="input-group">
            <input type="text" id="task-input" placeholder="Add a new task...">
            <button id="add-button">Add</button>
        </div>
        
        <ul id="task-list">
        </ul>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const taskInput = document.getElementById('task-input');
            const addButton = document.getElementById('add-button');
            const taskList = document.getElementById('task-list');
            
            loadTasks();

            addButton.addEventListener('click', function() {
                addTask();
            });

            taskInput.addEventListener('keypress', function(e) {
                if (e.key === 'Enter') {
                    addTask();
                }
            });

            function addTask() {
                const taskText = taskInput.value.trim();
                
                if (taskText) {
                    createTaskElement(taskText);
                    
                    taskInput.value = '';
                    
                    saveTasks();
                }
            }

            function createTaskElement(text, isCompleted = false) {
                const li = document.createElement('li');
                
                const taskSpan = document.createElement('span');
                taskSpan.textContent = text;
                if (isCompleted) {
                    taskSpan.classList.add('completed');
                }
                taskSpan.addEventListener('click', function() {
                    this.classList.toggle('completed');
                    saveTasks();
                });
                
                // Delete button
                const deleteBtn = document.createElement('button');
                deleteBtn.textContent = 'Delete';
                deleteBtn.className = 'delete-btn';
                deleteBtn.addEventListener('click', function() {
                    li.remove();
                    saveTasks();
                });
                
                li.appendChild(taskSpan);
                li.appendChild(deleteBtn);
                taskList.appendChild(li);
            }

            function saveTasks() {
                const tasks = [];
                document.querySelectorAll('#task-list li').forEach(function(item) {
                    const taskText = item.querySelector('span').textContent;
                    const isCompleted = item.querySelector('span').classList.contains('completed');
                    tasks.push({ text: taskText, completed: isCompleted });
                });
                
                localStorage.setItem('tasks', JSON.stringify(tasks));
            }

            function loadTasks() {
                const savedTasks = localStorage.getItem('tasks');
                
                if (savedTasks) {
                    const tasks = JSON.parse(savedTasks);
                    tasks.forEach(function(task) {
                        createTaskElement(task.text, task.completed);
                    });
                }
            }
        });
    </script>
</body>
</html></head>