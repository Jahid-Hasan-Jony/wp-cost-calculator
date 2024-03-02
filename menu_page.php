<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Drag & Drop Form Builder</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        .container {
            display: flex;
            height: 100vh;
        }

        .sidebar {
            width: 200px;
            background-color: #f0f0f0;
            padding: 20px;
        }

        .draggable {
            cursor: pointer;
            padding: 10px;
            border: 1px solid #ccc;
            margin-bottom: 5px;
        }

        .dropzone {
            display: flex;
            background-color: #e0e0e0;
            padding: 20px;
            min-height: 100%;
            gap: 15px;
            flex-direction: column;
        }

        .input-container {
            position: relative;
        }

        input.dropped-field {
            margin-bottom: 10px;
        }

        .remove-button {
            position: absolute;
            top: 0;
            right: 0;
            cursor: pointer;
            background-color: #ff0000;
            color: #fff;
            padding: 5px;
            border: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="sidebar">
            <div class="draggable" data-type="text" draggable="true">Text Field</div>
            <div class="draggable" data-type="email" draggable="true">Email Field</div>
            <div class="draggable" data-type="textarea" draggable="true">Textarea</div>
            <!-- Add more input field options as needed -->
        </div>
        <div class="dropzone" id="dropzone"></div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const draggableElements = document.querySelectorAll('.draggable');
            const dropzone = document.getElementById('dropzone');

            draggableElements.forEach(element => {
                element.addEventListener('dragstart', dragStart);
            });

            dropzone.addEventListener('dragover', dragOver);
            dropzone.addEventListener('drop', drop);

            function dragStart(event) {
                event.dataTransfer.setData('text/plain', event.target.dataset.type);
            }

            function dragOver(event) {
                event.preventDefault();
            }

            function drop(event) {
                event.preventDefault();
                const fieldType = event.dataTransfer.getData('text/plain');
                createInputField(fieldType);
            }

            function createInputField(type) {
                const inputContainer = document.createElement('div');
                inputContainer.classList.add('input-container');

                const inputField = document.createElement('input');
                inputField.type = type;
                inputField.placeholder = 'Enter ' + type;
                inputField.classList.add('dropped-field');

                const removeButton = document.createElement('button');
                removeButton.innerText = 'Remove';
                removeButton.classList.add('remove-button');
                removeButton.addEventListener('click', () => {
                    dropzone.removeChild(inputContainer);
                });

                inputContainer.appendChild(inputField);
                inputContainer.appendChild(removeButton);

                dropzone.appendChild(inputContainer);
            }
        });
    </script>
</body>
</html>
