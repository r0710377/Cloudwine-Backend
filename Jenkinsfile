node(){
    stage('Cloning Git') {
        checkout scm
    }
        
    stage('Install dependencies') {
        nodejs('nodejs') {
            sh 'npm install'
            echo "Modules installed"             
        }
    }
  
    stage('Test') {
        nodejs('nodejs') {
            sh 'npm run test'
            echo "Tests completed"
            discordSend description: "Running tests", footer: "Testing finished", result: currentBuild.currentResult, webhookURL: "https://discord.com/api/webhooks/938066793711411201/vpuwLXRQiNMzTGEngEsZJsN0eGYfI5BdWDIVWd1Vbcp5lhDcn4U-A476Dq2RaqVRGYbq"
        }
    }
  
    stage('Build') {
        nodejs('nodejs') {
            sh 'npm run build'
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
