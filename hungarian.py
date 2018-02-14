class Hungarian():
    def __init__(self, matrix):
        self.matrix = matrix
        self.reduced = matrix
        self.validate()

    def validate(self):
        if not isinstance(self.matrix, list):
            raise ValueError("Matrix is not valid!")

        return True

    def reduce(self):
        for cells in self.matrix:
            row = self.matrix.index(cells)
            minVal = min(cells)
            for cell in cells:
                column = cells.index(cell)
                self.reduced[row][column] -= minVal
        transposed = [list(x) for x in zip(*self.matrix)]
        for cells in transposed:
            column = transposed.index(cells)
            minVal = min(cells)
            for cell in cells:
                row = cells.index(cell)
                self.reduced[row][column] -= minVal

    def solve(self):
        self.reduce()
