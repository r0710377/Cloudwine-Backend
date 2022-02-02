node(){
    stage('Cloning Git') {
        checkout scm
    }
        
    stage('Install dependencies') {
        nodejs('nodejs') {
            sh 'npm install'
            sh 'composer install'
            echo "Modules installed"             
        }
    }
  
    stage('Test') {
        /*sh 'php ./vendor/bin/phpunit tests/Unit/ExampleTest.php'
        sh 'php ./vendor/bin/phpunit tests/Feature/ExampleTest.php'*/
        sh 'php artisan test'
        echo "Tests completed"
        discordSend description: "Running tests", footer: "Testing finished", result: currentBuild.currentResult, webhookURL: "https://discord.com/api/webhooks/938066793711411201/vpuwLXRQiNMzTGEngEsZJsN0eGYfI5BdWDIVWd1Vbcp5lhDcn4U-A476Dq2RaqVRGYbq"
    }
  
    stage('Build') {
        nodejs('nodejs') {
        
            sh 'cp .env.example .env'
            sh 'echo DB_HOST=robincraft007.ddns.net >> .env'
            sh 'echo DB_PORT=53306 >> .env'
            sh 'echo DB_DATABASE=project >> .env'
            sh 'echo DB_USERNAME=project_user >> .env'
            sh 'echo DB_PASSWORD=project_password >> .env'
            sh 'echo APP_NAME=Laravel >> .env'
            sh 'echo APP_DEBUG=false >> .env'
            sh 'echo APP_URL=https://ventomatkr3.sinners.be >> .env'
            
            sh 'sudo chmod o+w storage'
            sh 'sudo chmod o+w bootstrap/cache'
            
            sh 'php artisan key:generate'
            sh 'php artisan migrate'
            echo "Build completed"
        }
    }
 

    stage ('Deploy') {
        sh "sudo cp -a /var/lib/jenkins/workspace/cloudwine-backend/. /var/www/html/dist/cloudwine-backend"
        echo 'Copy completed'
      
        sh 'sudo lftp sftp://r0710377:Kaka_1234@sinners.be -e "mirror -R /var/www/html/dist/cloudwine-backend /ventomatkr3/public_html"'
        sh 'exit'
        echo 'Successful deploy'
    }
  
}
