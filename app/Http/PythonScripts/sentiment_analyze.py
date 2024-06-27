import json
import sys
import torch
from transformers import pipeline
from nltk.tokenize import word_tokenize
from nltk.corpus import stopwords
from collections import Counter
import nltk

# NLTK files
nltk.download('punkt')
nltk.download('stopwords')

def extract_keywords(text):
    stop_words = set(stopwords.words('english'))
    words = word_tokenize(text)
    filtered_words = [word for word in words if word.isalnum() and word.lower() not in stop_words]
    word_freq = Counter(filtered_words)
    return [word for word, freq in word_freq.most_common(10)]

def analyze_sentiment(text):
    sentiment_pipeline = pipeline('sentiment-analysis')
    sentiment = sentiment_pipeline(text)[0]
    return sentiment

if __name__ == "__main__":
    text = sys.argv[1]
    sentiment = analyze_sentiment(text)
    keywords = extract_keywords(text) if sentiment['label'] == 'NEGATIVE' else []
    result = {
        'sentiment': sentiment,
        'keywords': keywords
    }
    print(json.dumps(result))
