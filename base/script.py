# -*- coding: utf-8 -*-
import MySQLdb as sql
import sys

db = sql.connect(host='localhost',user='sanguosha',passwd='sanguosha',db='sanguosha',charset="utf8",use_unicode=True)

c = db.cursor()

dic = []

def weather():
	f = file(fname,'r')
	dat = f.readlines()
	for i in dat:
		a = i.split()
		d = [[a[0],a[1],int(a[2])]]
		dic.extend(d)
	return dic

def sc():
	f = file(fname, 'r')
	dat = f.readlines()
	for i in dat:
		a = i.split()
		dic.append(a)
	return dic

mode = sys.argv[1]

if 'weather' in mode:
	fname="weather.txt"
	weather()

	for i in dic:
		state = """INSERT INTO weather (name, effect, p, version) VALUES (\"%s\",\"%s\",%d,1);""" % (i[0],i[1],i[2])
		print state
		c.execute(state)
	db.commit()

elif 'sc' in mode:
	fname="scenario.txt"
	sc()

	for i in dic:
		name = i[0]
		rules = ' '.join(i[1:])
		state = ''
		if '(' in i[0]:
			char = i[0].split('(')[1][:-1]
			name = i[0].split('(')[0]
			if '*' in i[-1]:
				rules = ' '.join(i[1:-1])
				state = "INSERT INTO scenario (name, rules, special, version, charac) VALUES (\'%s\', \'%s\', \'%s\', 1, \'%s\')" % (name, rules, i[-1], char)
			else:
				state = "INSERT INTO scenario (name, rules, version, charac) VALUES (\'%s\', \'%s\', 1, \'%s\')" % (name, rules, char)
		else:
			if '*' in i[-1]:
				rules = ' '.join(i[1:-1])
				state = "INSERT INTO scenario (name, rules, special, version) VALUES (\'%s\', \'%s\', \'%s\', 1)" % (name, rules, i[-1])
			else:
				state = "INSERT INTO scenario (name, rules, version) VALUES (\'%s\', \'%s\', 1)" % (name, rules)
		c.execute(state)
	db.commit()
