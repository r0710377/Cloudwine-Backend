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
        sh 'php ./vendor/bin/phpunit tests/Unit/ExampleTest.php'
        sh 'php ./vendor/bin/phpunit tests/Feature/ExampleTest.php'
        echo "Tests completed"
        discordSend description: "Running tests", footer: "Testing finished", result: currentBuild.currentResult, webhookURL: "https://discord.com/api/webhooks/938066793711411201/vpuwLXRQiNMzTGEngEsZJsN0eGYfI5BdWDIVWd1Vbcp5lhDcn4U-A476Dq2RaqVRGYbq"
    }
  
    stage('Build') {
        nodejs('nodejs') {
             environment {
                DB_CONNECTION = "mysql"
                DB_HOST = credentials("robincraft007.ddns.net")
                DB_PORT = "53306"
                DB_DATABASE = credentials("project")
                DB_USERNAME = credentials("project_user")
                DB_PASSWORD = credentials("project_password")
                
                APP_NAME = 'Laravel'
                APP_ENV = 'production'
                APP_DEBUG = false
                APP_URL = 'https://ventomatkr3.sinners.be'
                
            }
            sh 'cp .env.example .env'
            sh 'echo DB_CONNECTION=${DB_CONNECTION} >> .env'
            sh 'echo DB_HOST=${DB_HOST} >> .env'
            sh 'echo DB_PORT=${DB_PORT} >> .env'
            sh 'echo DB_USERNAME=${DB_USERNAME} >> .env'
            sh 'echo DB_DATABASE=${DB_DATABASE} >> .env'
            sh 'echo DB_PASSWORD=${DB_PASSWORD} >> .env'
            sh 'echo APP_NAME=${APP_NAME} >> .env'
            sh 'echo APP_ENV=${APP_ENV} >> .env'
            sh 'echo APP_DEBUG=${APP_DEBUG} >> .env'
            sh 'echo APP_URL=${APP_URL} >> .env'
            sh 'php artisan key:generate'
            sh 'php artisan migrate'
            echo "Build completed"
        }
    }
 

    stage ('Deploy') {
        sh "sudo cp -a /var/lib/jenkins/workspace/cloudwine-backend/. /var/www/html/dist/cloudwine-backend"
        echo 'Copy completed'
      
        sh 'sudo lftp sftp://r0710377:Kaka_1234@sinners.be -e "cd ventomatkr3/public_html && mput /var/www/html/dist/cloudwine-backend/*"'
        sh 'exit'
        echo 'Successful deploy'
    }
  
}
