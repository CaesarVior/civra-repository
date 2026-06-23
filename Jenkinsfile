pipeline {
    agent any

    stages {
        stage('Checkout') {
            steps {
                checkout scm
            }
        }

        stage('Build & Deploy') {
            steps {
                echo 'Building and starting containers...'
                sh 'docker compose down -v'
                sh 'docker compose up -d --build'
            }
        }

        stage('Laravel Post-Deployment') {
            steps {
                echo 'Waiting for database...'
                sh 'sleep 10' 
                sh 'docker exec artisantz-app php artisan migrate --force'
                sh 'docker exec artisantz-app php artisan optimize:clear'
            }
        }
    }

    post {
        success {
            discordSend(
                description: "Branch: ${env.BRANCH_NAME}\nBuild: ${env.BUILD_NUMBER}\nStatus: success\n\n*No changes.*\n\n**Artifacts:**\n\n*No artifacts saved.*", 
                footer: "Jenkins v2.528.3, Discord Notifier v264.v70060b_a_b_d300", 
                link: env.BUILD_URL, 
                result: 'SUCCESS', 
                title: "${env.JOB_NAME} #${env.BUILD_NUMBER}", 
                webhookURL: "https://discord.com/api/webhooks/1354805761280315442/WBWj1zEx8LaM5SYJVJcVrW49n4M20BA4dUUg6gm9CXsoBECKnwbAm7m0wevYo4ORKOpd",
                notes: "<@869558551436210207> <@1491314589835591811> <@776248115073122334> <@995911519407722576> 🚀 Build selesai!"
            )
        }
        failure {
            discordSend(
                description: "Branch: ${env.BRANCH_NAME}\nBuild: ${env.BUILD_NUMBER}\nStatus: failure\n\n**Artifacts:**\n\n*No artifacts saved.*", 
                footer: "Jenkins v2.528.3, Discord Notifier v264.v70060b_a_b_d300", 
                link: env.BUILD_URL, 
                result: 'FAILURE', 
                title: "${env.JOB_NAME} #${env.BUILD_NUMBER}", 
                webhookURL: "https://discord.com/api/webhooks/1354805761280315442/WBWj1zEx8LaM5SYJVJcVrW49n4M20BA4dUUg6gm9CXsoBECKnwbAm7m0wevYo4ORKOpd",
                notes: "<@869558551436210207> <@1491314589835591811> <@776248115073122334> <@995911519407722576> ❌ Build gagal!"
            )
        }
    }
}