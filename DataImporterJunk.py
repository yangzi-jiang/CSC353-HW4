import csv
import pprint
import datetime
import glob
import sys
import operator
import itertools
import collections
from operator import itemgetter
from collections import OrderedDict
import json
import numpy as np
import pandas as pd
import math
from pandas.core.categorical import Categorical
# from spyderlib.widgets.externalshell import namespacebrowser

from pymongo import MongoClient

client = MongoClient()
db = client.tennis_database

collection = db.tennis_collection

def parse(t):
    string_ = str(t)
    try:
        return datetime.date(int(string_[:4]), int(string_[4:6]), int(string_[6:]))
    except:
        print ("Erro", len(string_))
        return datetime.date(1900, 1, 1)
        
def readAllFiles(dirname):
    allFiles = glob.glob(dirname + "/atp_rankings_" + "*.csv")
    ranks = pd.DataFrame()
    list_ = list()
    for filen in allFiles:
        print (filen)
        df = pd.read_csv(filen,
                         index_col=None,
                         header=None,
                         parse_dates=[0],
                         date_parser=lambda t:parse(t))
        list_.append(df)
    ranks = pd.concat(list_)

    return ranks

def main():
    ranks = readAllFiles("/Users/yangzijiang/Dropbox (Davidson College)/Davidson/04 4th Year/CSC353 - Database Systems/CSC353-HW4/HW4 Dataset copy")

if __name__ == "__main__":
    main()