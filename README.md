# Code Test
## Running the test
- Fork this repository
- Clone your fork: `git clone https://github.com/<your github username>/codetest-1.git`
### Windows
- Using Windows Explorer, browse to `codetest-1\test`, and double click on `test.cmd`

![](http://i.imgur.com/LFlkioh.png)
- Open and edit the code.* files in the main directory. Use any code editor you are comfortable with.

![](http://i.imgur.com/4CBdwDz.png)
- Test will re-execute on any code change.

![](http://i.imgur.com/fvPU3IQ.png)
- Press Ctrl-C to exit test monitor.
- Push to your fork
    ```
    git checkout -b "<your-name-with-dashes>"
    git commit -am"my test answers"
    git push --set-upstream origin <your-name-with-dashes>
    ```
- Submit a pull request 

### Mac/Linux
- Run Terminal ![](http://i.imgur.com/SXN3tNM.png)

- Install dependencies
    - Mac: 
        - Install git
            - Run `git` from Terminal command line, and if it's not installed, you should be prompted to install Xcode command line tools
        - Install Java (http://www.oracle.com/technetwork/java/javase/downloads/index.html)
        - Install Mono (http://www.mono-project.com/download/)
        - Install brew (http://brew.sh)
        - In Terminal, run `brew install scala node`
    - Ubuntu: 
        - Install git (`sudo apt-get install git`)
        - Install PHP (`sudo apt-get install php
        - Install mono/fsharp (`sudo apt-get install mono-devel fsharp`)
        - Install node
        ````
        curl -sL https://deb.nodesource.com/setup_8.x | sudo -E bash -
        sudo apt-get install -y nodejs
        ````
        - Install java 8 and scala 2.11.7 (see https://gist.github.com/bigsnarfdude/b2eb1cabfdaf7e62a8fc)
- Fork this repository
- Clone your fork: `git clone https://github.com/<your github username>/codetest-1.git`
- Run the test script
  - `cd codetest-1/test`
  - `sh test.sh`
- Open and edit the [Cc]ode.* files in the main directory. Use any code editor you are comfortable with.
- Test will re-execute on any code change.
- Press Ctrl-C to exit test monitor.
- Push to your fork
    ```
    git checkout -b "<your-name-with-dashes>"
    git commit -am"my test answers"
    git push --set-upstream origin <your-name-with-dashes>
    ```
- Submit a pull request
