# -*- coding: utf-8 -*-

import random as r

weather_array = {"晴天":"无效果",\
				"雨天":"雷伤害+1, 火伤害-1",\
				"雪天":"马无效",\
				"大风":"火伤害+1",\
				"大雾":"普通杀无效",\
				"瘟疫":"多弃一张牌",\
				"丰收":"多摸一张牌",\
				"洪水":"每名角色回合结束时弃掉所有装备区内的牌",\
				"蝗灾":"少摸一张牌",\
				"仁政":"少弃一张",\
				"叛乱":"回合结束阶段, 若体力大于一, 体力流失一点"}

scenario_array = {"黄巾之乱":"摸牌阶段少摸一张牌,从其他人那里得到一张牌.主公不被此战场影响.",\
				  "桃园结义":"每圈血量最少人+1血, 如果有超过一人血量最少, 猜拳决定",\
				"群雄逐鹿":"开局乱舞. 所有人回合开始阶段可选择是否摸牌多摸一张,如如此做则弃牌多弃一张.",\
				"官渡之战":"酒锁定为当兵粮寸断. 所有南蛮都是万箭",\
				"赤壁之战":"铁锁连环可最多连三人. 雷杀均为火杀",\
				"苦肉计":"黄盖弃四张牌以上回一点体力. 杀同势力角色时,出杀的一方可使用质疑.",\
				"草船借箭":"若杀被闪避掉, 则武器归受伤害方",\
				"华容道":"曹操可以濒死复活至两点血.   若场上有三种及以上不同血量, 血最多的人不能打血最少的人",\
				"走麦城":"关羽变神关羽.   方块桃和桃园结义只能当闪",\
				"猇亭之战":"满血收到两点火焰伤害",\
				"七擒孟获":"如果出现孟获, 被濒死状态被一个势力救活两次则归此势力(主公除外),并回复至两点体力.   所有万箭都是南蛮",\
				"失街亭":"马谡死亡,诸葛亮失去所有牌,无论誰主刀. 并进入空城计阶段",\
				"空城计":"诸葛亮空城无视南蛮. 所有人如手牌变化为0张,可以选择是否摸一张牌,仅限一次,仅限变化为0张时使用.",\
				"五丈原":"三血武将濒死可摸一张判定牌,如为锦囊则可回复至一点体力",\
				"三分归一统":"拥有主公技的武将手牌上限+1. 加一张装备:玉玺: 出牌阶段可执行一次判定,判定如为红桃则加一点体力."}

def weather():
	return r.choice(weather_array)


def scenario():
	m = r.randint(0,14)
	sc = scenario_array.keys()[m]
	sc_desc = scenario_array[sc]
	return (sc, sc_desc)

def read_sc(fname):
	f = file(fname, 'r')
	dat = f.readlines()
	dic = {}
	for i in dat:
		a = i.split()
		dic[a[0]] = a[1:]
	return dic

def read_weather(fname):
	f = file(fname,'r')
	dat = f.readlines()
	dic = []
	for i in dat:
		a = i.split()
		d = [[a[0],a[1]]]*int(a[2])
		dic.extend(d)
	return dic

def main():
	global scenario_array
	global weather_array
	scenario_array = read_sc('scenario.txt')
	weather_array = read_weather('weather.txt')
	print "请输入命令: "
	in_game = 0
	while 1:
		a = raw_input()
		if a == "exit" or a == "Exit":
			return
		elif a == "all sc":
			for i in scenario_array.keys():
				print "场景名称: ", i
		elif a == "all sc des":
			for i in scenario_array.keys():
				print "战场名称: ", i
				for j in scenario_array[i]:
					print "    战场特效: ", j
		elif a == "all weather":
			for i in weather_array:
				print "天气状况: ", i[0]
				print "    天气特效: ", i[1]
		elif a == "new":
			(s, sd) = scenario()
			print "这轮游戏的战场是: ", s
			print "此战场的规则为: "
			for i in sd:
				print '    ', i
			in_game = 1
		elif "new" in a:
			b = a.split()
			s = b[1]
			sd = scenario_array[s]
			print "这轮游戏的战场是: ", s
			print "此战场的规则为: "
			for i in sd:
				print '    ', i
			in_game = 1
		elif a == '' and in_game == 1:
			print "按回车取得下一月的事件"
			if a == "exit":
				return
			ev = weather()
			print "今天的天气是: ",ev[0]
			print "    天气效果为: ",ev[1]
		else:
			print "Type \'new\' for new game, press enter to change weather"
			print "  \'exit\' to exit the game"


main()
