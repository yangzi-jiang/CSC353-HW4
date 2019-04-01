import csv
import pprint
import sys
import collections
import json
#import numpy as np
import pandas as pd
import glob
import math

from pymongo import MongoClient

client = MongoClient()
db = client.tennis_database

# Three collections
collection = db.match_collection
collection = db.tournament_collection
collection = db.player_colletion

def readAllFiles(dirname):
    with open("atp_matches_1968.csv", 'r') as firstMatches:
        reader = csv.reader(firstMatches)
        FIELDS = next(reader)

    print(FIELDS)

    allMatchFiles = glob.glob(dirname + "/atp_matches_" + "*.csv")

    for filename in allMatchFiles:
        with open(filename, 'r') as matchCSVs:
            reader = csv.reader(matchCSVs)
            next(reader) #Skip the header row

            for row in reader:
                tourney_id = row[0]
                tourney_name = row[1]
                surface = row[2]
                draw_size = int(row[3])
                tourney_level = row[4]
                tourney_date = int(row[5])

                # print(', '.join(row))
                print (tourney_id)
                print ()

    return 

def main():
    matches = readAllFiles("/Users/yangzijiang/Dropbox (Davidson College)/Davidson/04 4th Year/CSC353 - Database Systems/CSC353-HW4/HW4 Dataset copy")

if __name__ == "__main__":
    main()