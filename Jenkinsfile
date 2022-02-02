pipeline {
 agent any
 stages {
       stage("Build") {
            steps {
                sh 'php --version'
                sh 'composer install'
                sh 'composer --version'
                sh 'cp .env.example .env'
                sh 'php artisan key:generate'
            }
        }
        stage("Unit test") {
            steps {
                sh 'php ./vendor/bin/phpunit tests/Feature/ExampleTest.php'
                sh 'php ./vendor/bin/phpunit tests/Unit/ExampleTest.php'
            }
        }
        stage("Code coverage") {
            steps {
                sh "vendor/bin/phpunit tests/Feature/ExampleTest.php --coverage-html 'reports/coverage'"
            }
        }
        stage("Static code analysis larastan") {
            steps {
                sh "vendor/bin/phpstan analyse --memory-limit=2G"
            }
        }
        stage("Static code analysis phpcs") {
            steps {
                sh "vendor/bin/phpcs"
            }
        }
     
        /*stage ('Deploy') {
            steps {
                
                sh "tar -zcvf bundle.tar.gz dist/cloudwine-frontend/"
                sh "sudo cp -R bundle.tar.gz /var/www/html && cd /var/www/html && sudo tar -xvf bundle.tar.gz"
                echo 'Copy completed'
      
                sh 'sudo lftp sftp://r0710377:Kaka_1234@sinners.be -e "cd ventomatkr3/public_html && mput /var/www/html/dist/cloudwine-frontend/*"'
                sh 'exit'
                echo 'Successful deploy'
            }
        }*/
}
