emails = open('data/emails.txt', 'r')
phones = open('data/phone.txt', 'r')
names = open('data/users.txt', 'r')
dates = open('data/date.txt', 'r')
usr_ts = open('data/type.txt', 'r')
passwords = open('data/password.txt','r')
usernames = open('data/username.txt', 'r')
main_file = open('load.txt', 'a')

for i in range(0, 50):
    email = "'" + emails.readline().split('\n')[0] + "', "
    phone = "'" + phones.readline().split('\n')[0] + "', "
    name = names.readline()
    date = "'" + dates.readline().split('\n')[0] + "', "
    tp = "'" + usr_ts.readline().split('\n')[0] + "', "
    password = "'" + passwords.readline().split('\n')[0] + "', "
    username = "'" + usernames.readline().split('\n')[0]
    if i != 49:
        username = username + "'\n"
    else:
        username = username + "' "

    fname, middle, lname = name.split(' ')
    fname = "'" +  fname + "', "
    middle = "'" + middle[0] + "', "
    lname = "'" + lname.split('\n')[0] + "', "
    record = email + phone + fname + lname + middle + date + tp + password + username
    main_file.write(record)



emails.close()
phones.close()
names.close()
dates.close()
usr_ts.close()
passwords.close()
usernames.close()
main_file.close()