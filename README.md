# Minimize URL App
Introducing application, designed to simplify link sharing with ease. The project is crafted using pure PHP, implementing a custom MVC controller. There's incorporated Bootstrap 5 for sleek and responsive design, along with small snippets of vanilla JavaScript for added interactivity.

## Table of Contents
 - [Getting Started](#getting-started)
 - [Available Commands](#available-commands)


### Getting Started
In the root directory, you can utilize the following 'make' commands to manage the Docker containers:

1. Clone the repository to your local machine:
```sh
    git clone https://github.com/AlekcukP/minimize-url.git
```

2. Navigate to the project's root directory:
```sh
    cd <project-directory>
```

3. Build the Docker containers:
```sh
    make build
```

4. Navigate to the web directory:
```sh
    cd ./web
```

5. Run dump-autoload:
```sh
    composer dump-autoload
```

5. Open your web browser and go to `http://localhost:8080` to access the application.


### Available Commands
In the root directory, you can run the following 'make' commands:

- `make up` <br>
Runs the Docker containers.

- `make down` <br>
Stops the Docker containers.

- `make bash` <br>
Opens a terminal inside the web container.

- `make build` <br>
Initiates Docker container building.
