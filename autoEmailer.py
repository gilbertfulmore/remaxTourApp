#!/usr/bin/python

# MySQL Driver MUST be installed for this script to work. Install it using
# $ sudo apt-get install python-mysqldb

# This script relies on the .env file in remax's root director, which is where this script should be placed.

import smtplib
import MySQLdb
import re

# Open the .env file and retreive the email server credentials
def getEmailCredentials():

    emailCredentials = {}

    envfile = open(".env", "r")
    data = envfile.read()
    envfile.close()

    emailCredentials['username'] = re.findall('(?<=MAIL_USERNAME=)\S+', data)
    emailCredentials['password'] = re.findall('(?<=MAIL_PASSWORD=)\S+', data)
    emailCredentials['port'] = re.findall('(?<=MAIL_PORT=)\w+', data)
    emailCredentials['host'] = re.findall('(?<=MAIL_HOST=)\S+', data)

    return emailCredentials

# Open the .env file and retreive the database information
def getDbCredentials():
    
    dbCredentials = {}
        
    envfile = open(".env", "r")
    data = envfile.read()
    envfile.close()

    dbCredentials['host'] = re.findall('(?<=DB_HOST=)\w+', data)
    dbCredentials['database'] = re.findall('(?<=DB_DATABASE=)\w+', data)
    dbCredentials['user'] = re.findall('(?<=DB_USERNAME=)\w+', data)
    dbCredentials['password'] = re.findall('(?<=DB_PASSWORD=)\w+', data)

    return dbCredentials


# Takes an array of emails, and sends the message to them
def sendmsg(emails, subject, message):

    emailCreds = getEmailCredentials()

    user_name = str(emailCreds['username']).strip('[]\'')
    passwd = str(emailCreds['password']).strip('[]\'')
    port = str(emailCreds['port']).strip('[]\'')
    smtp_srv = str(emailCreds['host']).strip('[]\'')

    print "USERNAME: " + user_name
    print "password: " + passwd
    print "port: " + port
    print "server: " + smtp_srv

    server = smtplib.SMTP(smtp_srv, 587)
    server.ehlo()
    server.starttls()
    server.ehlo()
    server.login(user_name, passwd)
    server.set_debuglevel(1)
    
    for email in emails:
        #server.sendmail(user_name, [email], message)
        pass

    server.quit()

# Retrieves the message to be sent from the database
# The message is created by the admin using our web app
def composeEmail(db):

    email = {}

    sql =  "SELECT subject, body " 
    sql += "FROM email_templates "
    sql += "WHERE name = 'default'"

    cur = db.cursor()
    
    cur.execute(sql)

    emailData = cur.fetchone()

    email['subject'] = emailData[0]
    email['body'] = emailData[1]

    return email

# Returns an array of agent's emails who are to recive the
# Weekly email
def getRecepiants(db):

    emails = []

    sql =  "SELECT email "
    sql += "FROM agents "

    cur = db.cursor()

    cur.execute(sql)

    for email in cur.fetchall():
            
            emails.append(email)

    return emails

###########################################################
# The database connection used for this script

dbCreds = getDbCredentials()


db = MySQLdb.connect(
        host =      str(dbCreds['host']).strip('[]\''),
        user =      str(dbCreds['user']).strip('[]\''),
        passwd =    str(dbCreds['password']).strip('[]\''),
        db =        str(dbCreds['database']).strip('[]\''))

# This is where the magic happens.

print "Populating CC list.."
emails = getRecepiants(db)

print "Composing Email..."
email  = composeEmail(db)

print "Sending Email..."
sendmsg(emails, email['subject'], email['body'])

print "...Done"


 #   #
 #   #
#######
## # ##
#######
#     #
#######
