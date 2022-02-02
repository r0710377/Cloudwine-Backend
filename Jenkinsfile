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
    
    stage("Code coverage") {
        sh "vendor/bin/phpunit --coverage-html 'reports/coverage'"
    }
  
    stage('Build') {
        nodejs('nodejs') {
            sh 'cp .env.example .env'
            sh 'php artisan key:generate'
            sh 'php artisan migrate'
            sh 'npm run development'
            sh 'npm run production'
            echo "Build completed"
        }
    }
 

    /*stage ('Deploy') {
        sh "tar -zcvf bundle.tar.gz dist/cloudwine-frontend/"
        sh "sudo cp -R bundle.tar.gz /var/www/html && cd /var/www/html && sudo tar -xvf bundle.tar.gz"
        echo 'Copy completed'
      
        sh 'sudo lftp sftp://r0710377:Kaka_1234@sinners.be -e "cd r0710377/public_html && mput /var/www/html/dist/cloudwine-frontend/*"'
        sh 'exit'
        echo 'Successful deploy'
    }*/
  
}
