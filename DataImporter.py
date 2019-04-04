import csv
import pprint
import sys
import collections
import json
#import numpy as np
#import pandas as pd
import glob
import math

import pymongo
from pymongo import MongoClient

client = MongoClient()
db = client.tennis_database

# Drop collections
db.matches.drop()
db.tournaments.drop()
db.players.drop()

# Three collections
matches = db.match_collection
tournaments = db.tournament_collection
tournament_index = db.tournament_collection.create_index([('tournery_name', pymongo.ASCENDING), ('tourney_date', pymongo.ASCENDING)], unique=True)

players = db.player_colletion
# player_index = db.players.create_index([('name', pymongo.ASCENDING), ('hand', pymongo.ASCENDING), ('ht', pymongo.ASCENDING),  ('ioc', pymongo.ASCENDING),], unique=True)


def readAllFiles(dirname):
    with open("atp_matches_1968.csv", 'r', encoding='utf-8')  as firstMatches:
        reader = csv.reader(firstMatches)
        FIELDS = next(reader)

    # print(FIELDS)

    allMatchFiles = glob.glob(dirname + "/atp_matches_" + "*.csv")

    for filename in allMatchFiles:
        with open(filename, 'r', encoding='utf-8') as matchCSVs:
            reader = csv.reader(matchCSVs)
            
            # using panda
            #reader = pd.read_csv(matchCSVs, skiprows=0) #Skip the header row

            next(reader) #Skip the header row

            for row in reader:
                # TODO tourney index
                # need to create index (primary key) using mongoDB, not in python, on tournament id and tournament name, 
                # so that you don't insert the same tournament mulitple times
                # should expect error from mongodb, as it can't insert the same thing twice, but the warnings are okay
                # not using python's dictionary to store unique tournament, because that will be doing the db's job

                # tourney_name = row[1] # surface = row[2] # draw_size = int(row[3]) # tourney_level = row[4] # tourney_date = int(row[5])
                # tournament = {FIELDS[1]: row[1], FIELDS[2]: row[2], FIELDS[3]: row[3], FIELDS[4]: row[4], FIELDS[5]: row[5]}
                tournament = {"tourney_name": row[1]}
                # tournament_id = tournaments.insert_one(tournament)
                
                # # TODO pkayer index
                # # winner name = 10, winner hand =11, ht = 12, ioc = 13,
                # player1 = {"name": row[10], "hand": row[11], "ht": row[12], "ioc": row[13]}
                # player1_id = players.insert_one(player1)

                # #name = 20, hand =21, ht = 22, ioc = 23
                # player2 = {"name": row[20], "hand": row[21], "ht": row[22], "ioc": row[23]}
                # player2_id = players.insert_one(player2)
            
                # tourney_id = row[0] # surface = row[2] # match_num = FIELDS[6]
                # Winner Seed = 8, winner entry = 9, winner age =14, rank = 15, rank pts = 16
                # loser Seed = 18, entry = 19, , age =24, rank = 25, rank pts = 26
                # match informations -  field 27 to 48
                # match = {"tournament_id": tournament_id, FIELDS[2]: row[2], FIELDS[4]: row[4], FIELDS[5]: int(row[5]), FIELDS[6]: int(row[6])}
                #         # FIELDS[10]: row[10], FIELDS[8]: row[8], FIELDS[9]: row[9], FIELDS[14]: row[14], FIELDS[15]: row[15], FIELDS[16]: row[16]}
                #         # FIELDS[20]: row[20], FIELDS[18]: row[18], FIELDS[19]: row[19], FIELDS[24]: row[24], FIELDS[25]: row[25], FIELDS[26]: row[26]}
                #         # FIELDS[27]: row[27], FIELDS[28]: row[28], FIELDS[29]: row[29], FIELDS[30]: row[30], FIELDS[31]: row[31], FIELDS[32]: row[32], 
                #         # FIELDS[33]: row[33], FIELDS[34]: row[34], FIELDS[35]: row[35], FIELDS[36]: row[36], FIELDS[37]: row[37], FIELDS[38]: row[38], 
                #         # FIELDS[39]: row[39], FIELDS[40]: row[40], FIELDS[41]: row[41], FIELDS[42]: row[42], FIELDS[43]: row[43], FIELDS[44]: row[44], 
                #         # FIELDS[45]: row[45], FIELDS[46]: row[46], FIELDS[47]: row[47], FIELDS[48]: row[48]}

                # match_id = matches.insert_one(match)
                
                # print(', '.join(row))
                # print (tournament)
                # print (tournament_id)
    
    return

def main():
    readAllFiles("/Users/yangzijiang/Dropbox (Davidson College)/Davidson/04 4th Year/CSC353 - Database Systems/CSC353-HW4/HW4 Dataset copy")

if __name__ == "__main__":
    main()