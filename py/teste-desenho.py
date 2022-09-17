import turtle

seta = turtle.Turtle()

def forma1():
    for i in range(4):
        seta.forward(100)
        seta.left(90)


def forma2():
    for i in range(10):
        for i in range(2):
            seta.forward(100)
            seta.right(60)
            seta.forward(100)
            seta.right(120)
        seta.right(36)